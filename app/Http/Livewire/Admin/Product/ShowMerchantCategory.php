<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use Livewire\Component;

class ShowMerchantCategory extends Component
{
    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = Category::find($id);
        if ($delData->subcategories->count() <= 0) {
            Category::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "You can't delete The Category :), Because there are {$delData->subcategories->count()} sub Category under it"]);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Category::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->save();
        } elseif ($action == 'enable') {
            $newData->status = 0;
            $newData->save();
        }
    }
    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }
    // render method 
    public function render()
    {
        return view('livewire.admin.product.show-merchant-category', [
            'datas' => Category::where('name', 'LIKE', "%{$this->searchItem}%")
                ->where('shop_as', 'merchant')
                ->orwhere('description', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'allcat' =>  Category::where('shop_as', 'merchant')->get()
        ]);
    }
}
