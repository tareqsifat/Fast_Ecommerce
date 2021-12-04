<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CustomersLogin extends Component
{
    public $message = NULL;
    public $phone;
    public $email;
    public $password;

    public function mount()
    {
        if (Auth::check()) {
            if (!Auth::user()->user_as == 'user') {
                return redirect(route('user.login'));
            } elseif (Auth::user()->user_as == 'user') {
                return redirect(route('home'));
            }
        }
    }


    public function login()
    {

        $this->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = Customers::where('phone', $this->phone)->first();
        if (isset($user) && $user->user_as == 'user') {
            if ($user->verify_status == 1) {
                if (Auth::guard('web')->attempt(['phone' => $this->phone, 'password' => $this->password])) {
                    return redirect()->route('home');
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
        return view('livewire.front.auth.customers.customers-login')->layout('layouts.web');
    }
}
