<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard');
            } else {
                return view('livewire.admin.auth.login')->with('message', "Invalid email or password");
            }
        } else {
            return view('livewire.admin.auth.login')->with('message', "Invalid email or password");
        }
    }
}
