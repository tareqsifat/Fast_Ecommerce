<?php

namespace App\Http\Livewire\Admin\Messages;

use App\Models\Subscriber;
use Livewire\Component;

class Subscribers extends Component
{
    public $perPage = 20;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = Subscriber::find($id);
        if ($delData) {
            Subscriber::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "Oppes! somethisng weant worng"]);
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
        $subscriber = Subscriber::where('status', 0)->update([
            'status' => 1,
        ]);
        return view('livewire.admin.messages.subscribers', [
            'datas' => Subscriber::where('email', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldata' =>  Subscriber::get()
        ]);
    }
}
