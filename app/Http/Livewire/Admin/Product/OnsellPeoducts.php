<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Productimage;
use App\Models\Sitedefault;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class OnsellPeoducts extends Component
{
    public $perPage = 25;
    public $searchItem;
    public $onsellTime;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];
    public function mount()
    {
        $finddata = Sitedefault::first();
        $this->onsellTime = $finddata->onsellTime;
    }
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
        } elseif ($action == 'enableAvailability') {
            $newData->availability = 0;
            $newData->save();
        } elseif ($action == 'desableAvailability') {
            $newData->availability = 1;
            $newData->save();
        }
    }
    // action on time change or seve 
    public function seveOnsellTime()
    {
        $finddata = Sitedefault::first();
        $finddata->onsellTime = $this->onsellTime;
        $finddata->save();
        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
    }
    // action on time change or seve 
    public function resetTime()
    {
        $finddata = Sitedefault::first();
        $this->onsellTime = NULL;
        $finddata->onsellTime = NULL;
        $finddata->save();
        $this->dispatchBrowserEvent('successalert', ['success' => 'Reset Successfully']);
    }


    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 25;
    }
    // render method 
    public function render()
    {
        // ->orWhere('product_code', 'LIKE', "%{$this->searchItem}%")
        return view('livewire.admin.product.onsell-peoducts', [
            'datas' => Product::where('product_code', 'LIKE', "%{$this->searchItem}%")
                ->whereNotNull('sale_price')
                ->where('shop_for', 'Fast deals')
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldata' =>  Product::whereNotNull('sale_price')->get()
        ]);
    }
}
