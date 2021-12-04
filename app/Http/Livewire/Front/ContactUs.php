<?php

namespace App\Http\Livewire\Front;

use App\Models\Contact;
use App\Models\Sitedefault;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $phone;
    public $email;
    public $message;
    // send method when form submite 
    public function sendMessage()
    {
        $validdata = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'message' => 'min:10',
        ]);
        Contact::create($validdata);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Thank you. Your Message Sent Suceessfully']);
        $this->clear();
    }
    public function clear()
    {
        $this->name = NULL;
        $this->phone = NULL;
        $this->email = NULL;
        $this->message = NULL;
    }
    // render methord to view the component
    public function render()
    {
        $datas  = Sitedefault::first();
        return view('livewire.front.contact-us', compact('datas'))->layout('layouts.web');
    }
}
