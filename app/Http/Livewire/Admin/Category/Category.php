<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $perPage = 20;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = ModelsCategory::find($id);
        if ($delData->subcategories->count() <= 0) {
            ModelsCategory::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "You can't delete The Category :), Because there are {$delData->subcategories->count()} sub Category under it"]);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsCategory::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $this->emit('refreshParent');
        } elseif ($action == 'enable') {
            $newData->status = 0;
            $newData->save();
            $this->emit('refreshParent');
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
        return view('livewire.admin.category.category', [
            'datas' => ModelsCategory::where('name', 'LIKE', "%{$this->searchItem}%")
                ->where('shop_as', 'fast_deals')
                ->orwhere('description', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'allcat' =>  ModelsCategory::where('shop_as', 'fast_deals')->get()
        ]);
    }
}
