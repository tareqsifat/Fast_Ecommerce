<?php

namespace App\Http\Livewire\Admin\Adds;

use App\Models\Add;
use Livewire\Component;

class Adds extends Component
{

    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        Add::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        }
    }


    public function render()
    {
        return view('livewire.admin.adds.adds', [
            'datas' => Add::latest()->where('title', 'LIKE', "%{$this->searchItem}%")
                ->where('description', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->get(),
            'allcat' =>  Add::all()
        ]);
    }
}
