<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class User extends Component
{
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $datasid = ModelsUser::where('id', $id)->first();
        $unlinkimg = $datasid->image;
        if (!is_null($unlinkimg)) {
            if (file_exists("uploads/user/$unlinkimg")) {
                unlink("uploads/user/$unlinkimg");
            };
        }
        ModelsUser::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = ModelsUser::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openEditmodal');
        }
    }

    public function render()
    {
        $datas = ModelsUser::where('user_as', 'admin')->where('name', 'LIKE', "%{$this->searchItem}%")
            ->where('email', 'LIKE', "%{$this->searchItem}%")
            ->orderBy('id', 'DESC')->paginate(10);
        // if (Auth::user()->user_role == 0) {
        return view('livewire.admin.users.user', compact('datas'));
        // }else{
        //     return abort('404');
        // }
    }
}
