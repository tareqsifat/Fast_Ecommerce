<?php

namespace App\Http\Livewire\Admin\Notification;

use App\Models\Notification as ModelsNotification;
use Livewire\Component;

class Notification extends Component
{


    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = ModelsNotification::find($id);
        if ($delData) {
            ModelsNotification::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        };
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsNotification::find($data);
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
        return view('livewire.admin.notification.notification', [
            'datas' => ModelsNotification::where('title', 'LIKE', "%{$this->searchItem}%")
                ->orwhere('body', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  ModelsNotification::all()
        ]);
    }
}
