<?php

namespace App\Http\Livewire\Front\Auth\Merchant;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchantLogin extends Component
{
    public $message = NULL;
    public $phone;
    public $email;
    public $password;

    public function mount()
    {
        if (Auth::check()) {
            if (!Auth::user()->user_as == 'merchent') {
                return redirect(route('merchant.login'));
            } elseif (Auth::user()->user_as == 'merchent') {
                return redirect(route('merchent.dashboard'));
            }
        }
    }

    public function login()
    {

        $this->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = Merchant::where('phone', $this->phone)->first();
        if (isset($user) && $user->user_as == 'merchent') {
            $userdata = array(
                'phone'    => $this->phone,
                'password' => $this->password,
            );
            if ($user->verify_status == 1) {
                if (Auth::guard('merchent')->attempt(['phone' => $this->phone, 'password' => $this->password])) {
                    return redirect(route('merchent.dashboard'));
                } else {
                    $this->message = 'Invalid password';
                }
            } else {
                $this->message = 'Unverifyed user';
            }
        } else {
            $this->message = 'User not found !';
        }
    }

    public function render()
    {
        return view('livewire.front.auth.merchant.merchant-login')->layout('layouts.web');
    }
}
