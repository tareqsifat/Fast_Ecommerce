<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersProfile extends Component
{
    public $data;
    public $profile = false;
    public $name;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $gander;
    public $brithdate;
    function mount()
    {
        $data = Customers::where('id', Auth::user()->id)->first();
        $this->data = $data;
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->brithdate = $data->brithdate;
        $this->gander = $data->gander;
    }


    public function editAction()
    {
        $this->profile = true;
    }
    public function close()
    {
        $this->profile = false;
    }
    public function save()
    {
        $data = Customers::where('id', Auth::user()->id)->first();
        $data->name =  $this->name;
        $data->first_name =  $this->first_name;
        $data->last_name =  $this->last_name;
        $data->email =  $this->email;
        $data->phone =  $this->phone;
        $data->gander =  $this->gander;
        $data->brithdate =  $this->brithdate;
        $data->save();
        $this->data = $data;
        $this->profile = false;
    }

    public function render()
    {
        if (Auth::user()->user_as == 'user') {
            return view('livewire.front.auth.customers.users-profile')->layout('layouts.web');
        } else {
            return abort(401);
        }
    }
}
