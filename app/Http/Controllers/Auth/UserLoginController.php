<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ViewErrorBag;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-auth.register');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forgetpassword()
    {
        return view('user-auth.forgetpassword');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function verify(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]); 
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'user_as' => 'user',
        ];

        $remember_me  = (!empty($request->remember_me)) ? TRUE : FALSE;
        if (Auth::attempt($credential)) {
            $user = User::where(["email" => $credential['email']])->first();
            Auth::login($user, $remember_me);
            return redirect(route('home'));
        } else {
            return back();
            session()->flush('message', "envalid email and password");
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password',
        ]);
        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password' => Hash::make($request->password),
            'phone'   => $request->phone,
            'user_as'   => 'user',
        ]);
        return redirect()->route('home');
    }

 
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect()->route('user.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
