<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\OrderItems;
use Livewire\Component;

class Orders extends Component
{
    public $perPage = 25;
    public $searchItem;

    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 25;
    }

    // action after edite button click
    /**
     * Create a new instance
     *
     * @param data $admin
     * @param action $admin
     * @return void
     */
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Order::find($data);
        if ($action == 'view') {
            $newData->notification = 1;
            $newData->save();
            $this->emit('refreshParent');
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'message') {
            $newData->notification = 1;
            $newData->save();
            $this->emit('refreshParent');
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openMessagemodal');
        }
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function changeStatusEvent($value, $id)
    {
        $orderItem = Order::where('id', $id)->first();
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

    /**
     * Create a new instance
     *
     * @param id $admin
     * @return void
     */
    public function delete($id)
    {
        $odataItem = Order::find($id);
        if ($odataItem) {
            OrderItems::where('order_id', $odataItem->id)->delete();
            Order::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return redirect(404);
        }
    }
    // render to view the component 
    public function render()
    {
        return view(
            'livewire.admin.orders.orders',
            [
                'datas' => Order::where('orderfor', 'normal')->where('orderId', 'LIKE', "%{$this->searchItem}%")
                    ->orderBy('id', 'desc')->paginate($this->perPage),
                'alldata' =>  Order::all(),
            ]
        );
    }
}
