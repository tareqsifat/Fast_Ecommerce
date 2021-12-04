<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{


    public $oldPassword;
    public $password;
    public $password_confirmation;
    public $message;


    public function changePassword()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $this->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);
        if (Hash::check($this->oldPassword, $user->password)) {
            $user->Password =  Hash::make($this->password);
            $user->save();
            Auth::logout();
            return redirect('/');
        } else {
            $this->message = "password not match ";
        }
    }
    public function render()
    {
        return view('livewire.front.auth.customers.password')->layout('layouts.web');
    }
}
