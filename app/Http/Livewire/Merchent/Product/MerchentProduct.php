<?php

namespace App\Http\Livewire\Merchent\Product;

use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class MerchentProduct extends Component
{
    public $perPage = 25;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delId = Product::find($id);
        $delProductImage = Productimage::where('product_id', $id)->get();
        if ($delId) {
            if (file_exists("uploads/products/thumbnails/$delId->thumbnail")) {
                File::delete("uploads/products/thumbnails/$delId->thumbnail");
            };
            if ($delProductImage->count() > 0) {
                foreach ($delProductImage as $delImgItem) {
                    if (file_exists("uploads/products/images/$delImgItem->image")) {
                        File::delete("uploads/products/images/$delImgItem->image");
                    };
                    Productimage::destroy($delImgItem->id);
                }
            }
            Product::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort('404');
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Product::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->save();
        } elseif ($action == 'enable') {
            $newData->status = 0;
            $newData->save();
            $newData->save();
        } elseif ($action == 'enableOnSellingStatus') {
            $newData->sellingStatus = 1;
            $newData->save();
        } elseif ($action == 'desableOnSellingStatus') {
            $newData->sellingStatus = 0;
            $newData->save();
        }
    }

    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 25;
    }
    // render method 
    public function render()
    {
        if (Auth::user()->user_role == 1) {
            return view('livewire.merchent.product.merchent-product', [
                'datas' => Product::where('title', 'LIKE', "%{$this->searchItem}%")
                    ->where('product_for', 'fast_deals')
                    ->where('shop_for', 'Merchant')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')->paginate($this->perPage),
                'alldata' =>  Product::where('product_for', 'fast_deals')->where('shop_for', 'Merchant')->where('user_id', Auth::user()->id)->get(),
            ]);
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
