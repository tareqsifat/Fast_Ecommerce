<?php

namespace App\Http\Livewire\Merchent\Product;

use App\Models\AskQuestion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchantProductQuestion extends Component
{

    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = AskQuestion::find($id);
        if ($delData) {
            AskQuestion::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = AskQuestion::find($data);
        if ($action == 'enable') {
            $newData->notification = 1;
            $newData->status = 0;
            $newData->save();
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->notification = 1;
            $newData->save();
        } elseif ($action == 'Reply') {
            $newData->notification = 1;
            $newData->save();
            $this->emit('refreshParent');
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
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
            return view(
                'livewire.merchent.product.merchant-product-question',
                [
                    'datas' => AskQuestion::where('shop_id', Auth::user()->id)
                        ->where('shop_as', 'Merchant')
                        ->orderBy('id', 'desc')->paginate($this->perPage),
                    'alldatas' =>  AskQuestion::where('shop_as', 'Merchant')->get()
                ]
            );
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
