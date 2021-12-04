<?php

namespace App\Http\Livewire\Merchent\Product\Category;

use App\Models\Subcategory as ModelsSubcategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubCategory extends Component
{
    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = ModelsSubcategory::find($id);
        if ($delData->product->count() > 0) {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "You can't delete The SubCategory :), Because there are {$delData->product->count()} Products under it"]);
        } else {
            ModelsSubcategory::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsSubcategory::find($data);
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
            return view('livewire.merchent.product.category.sub-category', [
                'datas' => ModelsSubcategory::where('name', 'LIKE', "%{$this->searchItem}%")
                    ->where('user_id', Auth::user()->id)
                    ->orwhere('description', 'LIKE', "%{$this->searchItem}%")
                    ->orderBy('id', 'desc')->paginate($this->perPage),
                'allcat' =>  ModelsSubcategory::where('user_id', Auth::user()->id)->get(),

            ]);
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
