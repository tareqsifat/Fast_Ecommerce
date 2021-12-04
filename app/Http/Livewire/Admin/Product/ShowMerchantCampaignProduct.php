<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Support\Facades\File;

class ShowMerchantCampaignProduct extends Component
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
                    if (file_exists("uploads/products/campaign/images/$delImgItem->image")) {
                        File::delete("uploads/products/campaign/images/$delImgItem->image");
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
        return view('livewire.admin.product.show-merchant-campaign-product', [
            'datas' => Product::where('title', 'LIKE', "%{$this->searchItem}%")
                ->where('shop_for', 'Merchant')
                ->where('product_for', 'campaign')
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldata' =>  Product::where('shop_for', 'Merchant')->where('product_for', 'campaign')->get(),
        ]);
    }
}
