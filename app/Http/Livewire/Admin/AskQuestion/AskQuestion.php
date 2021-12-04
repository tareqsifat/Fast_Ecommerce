<?php

namespace App\Http\Livewire\Admin\AskQuestion;

use App\Models\AskQuestion as ModelsAskQuestion;
use Livewire\Component;

class AskQuestion extends Component
{
    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = ModelsAskQuestion::find($id);
        if ($delData) {
            ModelsAskQuestion::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsAskQuestion::find($data);
        if ($action == 'enable') {
            $newData->notification = 1;
            $newData->status = 0;
            $newData->save();
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->notification = 1;
            $newData->save();
        } elseif ($action == 'Reply') {
            $newData->notification = 1;
            $newData->save();
            $this->emit('refreshParent');
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        }
    }
    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }
    public function render()
    {
        return view(
            'livewire.admin.ask-question.ask-question',
            [
                'datas' => ModelsAskQuestion::where('product_title', 'LIKE', "%{$this->searchItem}%")
                    ->orwhere('description', 'LIKE', "%{$this->searchItem}%")
                    ->orderBy('id', 'desc')->paginate($this->perPage),
                'alldatas' =>  ModelsAskQuestion::all()
            ]
        );;
    }
}
