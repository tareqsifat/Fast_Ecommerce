<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\BeforeBornCategory as ModelsBeforeBornCategory;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class BeforeBornCategory extends Component
{

    public $perPage = 20;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = ModelsBeforeBornCategory::find($id);
        if ($delData->product->count() <= 0) {
            if (file_exists("uploads/category/$delData->image")) {
                File::delete("uploads/category/$delData->image");
            }
            ModelsBeforeBornCategory::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "You can't delete The Category :), Because there are {$delData->subcategories->count()} sub Category under it"]);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsBeforeBornCategory::find($data);
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
        $this->perPage = $this->perPage + 20;
    }
    // render method 
    public function render()
    {
        return view('livewire.admin.category.before-born-category', [
            'datas' => ModelsBeforeBornCategory::where('name', 'LIKE', "%{$this->searchItem}%")
                ->where('shop_as', 'fast_deals')
                ->orwhere('description', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  ModelsBeforeBornCategory::where('shop_as', 'fast_deals')->get()
        ]);
    }
}
