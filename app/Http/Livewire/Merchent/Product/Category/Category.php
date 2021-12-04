<?php

namespace App\Http\Livewire\Merchent\Product\Category;

use App\Models\Category as ModelsCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Category extends Component
{

    public $perPage = 10;
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
        if (Auth::user()->user_role == 1) {
            return view('livewire.merchent.product.category.category', [
                'datas' => ModelsCategory::where('name', 'LIKE', "%{$this->searchItem}%")
                    ->where('user_id', Auth::user()->id)
                    ->where('shop_as', 'merchant')
                    ->orderBy('id', 'desc')->paginate($this->perPage),
                'allcat' =>  ModelsCategory::where('shop_as', 'merchant')->where('user_id', Auth::user()->id)->get(),
            ]);
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
