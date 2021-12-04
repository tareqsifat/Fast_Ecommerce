<?php

namespace App\Http\Livewire\Merchent\Orders;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{

    public $searchItem;
    public $perPage = 10;
    public $item;
    public $showDetails = false;
    protected $listeners = ['refreshParent' => '$refresh'];

    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = OrderItems::find($data);
        if ($action == 'view') {
            $this->emit('getModalId', $this->item);
            $this->showDetails = true;
            $this->dispatchBrowserEvent('openmodal');
            $newData->notification = 1;
            $newData->save();
        } elseif ($action == 'panding') { /* action where click status button */
            $newData->status = 1;
            $newData->notification = 1;
            $newData->save();
        } elseif ($action == 'processing') { /* action where click status button */
            $newData->status = 2;
            $newData->save();
        } elseif ($action == 'cancel') { /* action where click status button */
            $newData->status = 3;
            $newData->save();
            // compelte
        } elseif ($action == 'complete') {
            $newData->status = 0;
            $newData->save();
            // make it panding
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
    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }

    public function render()
    {
        if (Auth::user()->user_role == 1) {
            return view('livewire.merchent.orders.orders', [
                'pdatas' => OrderItems::where('order_id', 'LIKE', "%{$this->searchItem}%")
                    ->where('product_by_shopid', Auth::user()->id)
                    ->where('shop_for', 'merchant')
                    ->orderBy('id', 'DESC')->paginate($this->perPage),
                'alldatas' =>  OrderItems::where('product_by_shopid', Auth::user()->id)->where('shop_for', 'merchant')->get(),
            ]);
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
