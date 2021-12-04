<?php

namespace App\Http\Livewire\Admin\Users\Merchent;

use App\Models\Merchant;
use Livewire\Component;

class MerchentUsers extends Component
{
    public $searchItem;
    public $perPage = 50;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $datasid = Merchant::where('id', $id)->first();
        $unlinkimg = $datasid->image;
        if (!is_null($unlinkimg)) {
            if (file_exists("uploads/user/$unlinkimg")) {
                unlink("uploads/user/$unlinkimg");
            };
        }
        Merchant::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }

    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = Merchant::find($data);
        if ($action == 'view') {
            $newdata->notification = 1;
            $newdata->save();
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('merchantUserView');
        } elseif ($action == 'approve') { /* action where click status button */
            $newdata->user_role = 0;
            $newdata->save();
            $this->emit('refreshParent');
        } elseif ($action == 'panding') {
            $newdata->user_role = 1;
            $newdata->notification = 1;
            $newdata->save();
            $this->emit('refreshParent');
        }
    }

    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 50;
    }

    public function render()
    {
        return view('livewire.admin.users.merchent.merchent-users', [
            'datas' => Merchant::where('email', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'DESC')->paginate($this->perPage),
            'alldatas' =>  Merchant::get(),
        ]);
    }
}
