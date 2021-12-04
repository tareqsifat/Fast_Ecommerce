<?php

namespace App\Http\Livewire\Front\Inc;

use App\Models\Pmethod;
use App\Models\Service;
use App\Models\Sitedefault;
use App\Models\Social;
use App\Models\Subscriber;
use Livewire\Component;

class Footer extends Component
{

    public $email;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'Please Enter Your Email address',
            'email.unique' => 'Oppes! You are already our subscribers! Please use another email address',
        ]);
        Subscriber::create([
            'email' => $this->email,
        ]);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Submit successfully. Thank you For Subscribe us']);
        $this->email = null;
    }

    public function render()
    {
        $datas = Sitedefault::first();
        $social = Social::where('status', 0)->get();
        $paymentImage = Pmethod::where('status', 0)->get();
        return view('livewire.front.inc.footer', compact(['datas', 'social', 'paymentImage']));
    }
}
