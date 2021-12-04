<?php

namespace App\Http\Livewire\Front\Auth\Merchant;

use App\Mail\PasswordReset;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MerchantRegistration extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $brithdate;
    public $gander;
    public $gCaptcha;
    public $password;
    public $termsAndCondition;
    public $password_confirmation;
    // mount method to prerandering the component 
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

    // sign up to registr user 
    public function signUp()
    {
        $this->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'gander' => 'required',
            'email' => 'email|unique:merchants,email',
            'phone' =>  'required|min:11|unique:merchants,phone',
            'brithdate' => 'required',
            'termsAndCondition' => 'required',
            // 'gCaptcha' => 'required'
        ], [
            'termsAndCondition.required' => 'Please Check this filed',

        ]);
        $code = rand(1111, 9999);
        $data =  Merchant::create([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->phone,
            'phone'      => $this->phone,
            'user_as'    => 'merchent',
            'email'      => $this->email,
            'brithdate'  => $this->brithdate,
            'verification_code'  => $code,
        ]);
        if ($data) {
            $senddata = array(
                'subject' => 'Fast Deals verify code',
                'message' => 'Your Fast Deals Acount Vrrification code',
                'token'    => $code,
            );
            if (!empty($this->email)) {
                Mail::to($this->email)->send(new PasswordReset($senddata));
            }
            $url = "http://api.greenweb.com.bd/api.php?json";
            $send_smsdata = array(
                'to' => $this->phone,
                'message' => "$code Fast Deals Verification code",
                'token' => "9fe4dec45c593c4c77324743ca474868"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send_smsdata));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
        }
        session(['verification_code' => $code]);
        return redirect()->route('post.otp');
    }

    // to view the component 
    public function render()
    {
        return view('livewire.front.auth.merchant.merchant-registration')->layout('layouts.web');
    }
}
