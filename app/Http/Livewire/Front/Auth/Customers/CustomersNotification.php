<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\SendMessaage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomersNotification extends Component
{
    public $per_page = 20;
    function mount()
    {
        $getIdes = SendMessaage::where('user_id', Auth::user()->id)->where('notification', 0)->pluck('id');
        SendMessaage::whereIn('id', $getIdes)
            ->update([
                'notification' => '1',
            ]);
    }

    // delete into database 
    public function delete($id)
    {
        $delData = SendMessaage::find($id);
        if ($delData) {
            SendMessaage::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "Oops something went wrong"]);
        }
    }
    public function render()
    {
        return view('livewire.front.auth.customers.customers-notification', [
            'datas' => SendMessaage::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate($this->per_page),
            'alldatas' => SendMessaage::where('user_id', Auth::user()->id)->get(),
        ])->layout('layouts.web');
    }
}
