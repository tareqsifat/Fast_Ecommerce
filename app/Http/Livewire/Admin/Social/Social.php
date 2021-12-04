<?php

namespace App\Http\Livewire\Admin\Social;

use App\Models\Social as ModelsSocial;
use Livewire\Component;

class Social extends Component
{
    public $item;
    public $searchItem;
    protected $listeners = ['refreshParent' => '$refresh'];
    // delete into database 
    public function delete($id)
    {
        ModelsSocial::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = ModelsSocial::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newdata->status = 1;
            $newdata->save();
        } elseif ($action == 'enable') {
            $newdata->status = 0;
            $newdata->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.social.social', [
            'datas' => ModelsSocial::where('name', 'LIKE', "%{$this->searchItem}%")
                ->where('icon', 'LIKE', "%{$this->searchItem}%")
                ->where('url', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->get(),
            'allcat' =>  ModelsSocial::all()
        ]);
    }
}
