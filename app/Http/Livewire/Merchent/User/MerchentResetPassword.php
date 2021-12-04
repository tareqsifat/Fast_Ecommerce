<?php

namespace App\Http\Livewire\Merchent\User;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MerchentResetPassword extends Component
{

    public $oldPassword;
    public $password;
    public $password_confirmation;
    public $message;


    public function changePassword()
    {
        $user = Merchant::where('id', Auth::user()->id)->first();
        $this->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);
        if (Hash::check($this->oldPassword, $user->password)) {
            $user->Password =  Hash::make($this->password);
            $user->save();
            Auth::logout();
            return redirect('/merchant/login');
        } else {
            $this->message = "password not match ";
        }
    }
    public function render()
    {
        return view('livewire.merchent.user.merchent-reset-password');
    }
}
