<?php

namespace App\Http\Livewire\Admin\Users\Customer;

use App\Models\Customers as ModelsCustomers;
use Livewire\Component;

class Customers extends Component
{

    public $searchItem;
    public $perPage = 10;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $datasid = ModelsCustomers::where('id', $id)->first();
        $unlinkimg = $datasid->image;
        if (!is_null($unlinkimg)) {
            if (file_exists("uploads/user/$unlinkimg")) {
                unlink("uploads/user/$unlinkimg");
            };
        }
        ModelsCustomers::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }

    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = ModelsCustomers::find($data);
        if ($action == 'view') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('modalviewForm');
            $newdata->Notification = 1;
            $newdata->save();
        } elseif ($action == 'desableNotification') { /* action where click status button */
            $newdata->Notification = 0;
            $newdata->save();
            $this->emit('refreshParent');
        } elseif ($action == 'enableNotification') {
            $newdata->Notification = 1;
            $newdata->save();
            $this->emit('refreshParent');
        }
    }

    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }

    public function render()
    {
        // if (Auth::user()->user_role == 0) {
        return view('livewire.admin.users.customer.customers', [
            'datas' => ModelsCustomers::where('phone', 'LIKE', "%{$this->searchItem}%")
                ->where('user_as', 'user')
                ->orderBy('id', 'DESC')->paginate($this->perPage),
            'alldatas' =>  ModelsCustomers::where('user_as', 'merchent')->get(),
        ]);
        // }else{
        //     return abort('404');
        // }
    }
}
