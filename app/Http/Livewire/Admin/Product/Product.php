<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product as ModelsProduct;
use App\Models\Productimage;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Product extends Component
{
    public $perPage = 20;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delId = ModelsProduct::find($id);
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
            ModelsProduct::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort('404');
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsProduct::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->save();
        } elseif ($action == 'enable') {
            $newData->status = 0;
            $newData->save();
        } elseif ($action == 'enableAvailability') {
            $newData->availability = 0;
            $newData->save();
        } elseif ($action == 'desableAvailability') {
            $newData->availability = 1;
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
        return view('livewire.admin.product.product', [
            'datas' => ModelsProduct::where('product_for', 'fast_deals')
                ->where('title', 'LIKE', "%{$this->searchItem}%")
                ->where('product_code', 'LIKE', "%{$this->searchItem}%")
                ->where('shop_for', 'Fast Deals')
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldata' =>  ModelsProduct::where('product_for', 'fast_deals')->where('shop_for', 'Fast Deals')->get()
        ]);
    }
}
