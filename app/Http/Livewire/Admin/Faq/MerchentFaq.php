<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;

class MerchentFaq extends Component
{
    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $did = Faq::find($id);
        if ($did) {
            Faq::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Faq::find($data);
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


    // render method 
    public function render()
    {
        return view('livewire.admin.faq.merchent-faq', [
            'datas' => Faq::where('title', 'LIKE', "%{$this->searchItem}%")
                ->orwhere('description', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  Faq::all()
        ]);
    }
}
