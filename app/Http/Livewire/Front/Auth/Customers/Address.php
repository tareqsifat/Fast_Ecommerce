<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Address extends Component
{
    public $data;
    public $present_address;
    public $adress;
    public $adress_form = false;
    public $present_address_form = false;


    function mount()
    {
        $data = Customers::where('id', Auth::user()->id)->first();
        $this->present_address = $data->present_address;
        $this->adress = $data->adress;
        $this->data = $data;
    }

    public function addItem($action)
    {
        if ($action == 'present_address') {
            $this->present_address_form = true;
        } elseif ($action == 'adress') {
            $this->adress_form = true;
        }
    }
    public function saveItem($action)
    {
        if ($action == 'present_address') {
            $this->data->present_address = $this->present_address;
            $this->data->save();
            $this->present_address_form = false;
        } elseif ($action == "adress") {
            $this->data->adress = $this->adress;
            $this->data->save();
            $this->adress_form = false;
        }
        $this->dispatchBrowserEvent('successalert', ['success' => 'Change suceessfully']);
    }


    public function close()
    {
        $this->adress_form = false;
        $this->present_address_form = false;
    }
    public function render()
    {
        return view('livewire.front.auth.customers.address')->layout('layouts.web');
    }
}
