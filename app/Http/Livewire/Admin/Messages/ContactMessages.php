<?php

namespace App\Http\Livewire\Admin\Messages;

use App\Models\Contact;
use Livewire\Component;

class ContactMessages extends Component
{
    public $item;
    public $searchItem;
    protected $listeners = ['refreshParent' => '$refresh'];
    // delete into database 
    public function delete($id)
    {
        Contact::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = Contact::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newdata->notification = 1;
            $newdata->save();
            $this->emit('refreshParent');
        } elseif ($action == 'enable') {
            $newdata->notification = 0;
            $newdata->save();
            $this->emit('refreshParent');
        }
    }

    public function render()
    {
        $datas = Contact::get();
        return view('livewire.admin.messages.contact-messages', compact('datas'));
    }
}
