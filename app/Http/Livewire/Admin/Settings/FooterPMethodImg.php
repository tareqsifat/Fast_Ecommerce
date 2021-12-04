<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Pmethod;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class FooterPMethodImg extends Component
{

    public $perPage = 20;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = Pmethod::find($id);
        if ($delData) {
            if (file_exists("uploads/brands/$delData->image")) {
                File::delete("uploads/brands/$delData->image");
            }
            Pmethod::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "Oppes Something Went Worng! Please Reload the page and try again"]);
        };
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Pmethod::find($data);
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
        return view('livewire.admin.settings.footer-p-method-img', [
            'datas' => Pmethod::where('name', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  Pmethod::all()
        ]);
    }
}
