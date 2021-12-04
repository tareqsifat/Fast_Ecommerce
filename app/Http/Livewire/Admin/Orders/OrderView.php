<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\OrderItems;
use Livewire\Component;

class OrderView extends Component
{
    public $orderDatas;
    public $item;
    protected $listeners = [
        'getModalId',
    ];
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        if ($itemIdentity) {
            $this->orderDatas = Order::where('id', $itemIdentity)->first();
        } else {
            return back();
        }
    }

    public function delete($id)
    {
        $odataItem = OrderItems::find($id);
        if ($odataItem) {
            OrderItems::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return redirect(404);
        }
    }

    public function close()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        return view('livewire.admin.orders.order-view');
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function changeStatusEvent($value, $id)
    {
        $orderItem = OrderItems::where('id', $id)->first();
        if ($orderItem) {
            if ($value == 0) {
                $orderItem->status = 0;
            } elseif ($value == 1) {
                $orderItem->status = 1;
            } elseif ($value == 2) {
                $orderItem->status = 2;
            } elseif ($value == 3) {
                $orderItem->status = 3;
            }
            $orderItem->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Status Changed Successfully']);
        } else {
            return abort(404);
        }
    }
}
