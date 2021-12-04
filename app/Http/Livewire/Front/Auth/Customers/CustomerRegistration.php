<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\User;
use App\Mail\PasswordReset;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CustomerRegistration extends Component
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



    // mount method to to pre load the component 
    // check auth user 
    // redirect user 
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

    // sign up to create an customers account
    public function signUp()
    {
        $this->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'gander' => 'required',
            'email' => 'email|unique:customers,email',
            'phone' =>  'required|min:11|unique:customers,phone',
            'brithdate' => 'required',
            'termsAndCondition' => 'required',
            // 'gCaptcha' => 'required'
        ], [
            'termsAndCondition.required' => 'Please Check this filed',

        ]);

        $code = rand(1111, 9999);
        $data =  Customers::create([
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'email'        => $this->phone,
            'phone'        => $this->phone,
            'email'        => $this->email,
            'gander'        => $this->gander,
            'brithdate'        => $this->brithdate,
            'verification_code'  => $code,
        ]);
        if ($data) {
            $senddata = array(
                'subject' => 'Fast Deals verify code',
                'message' => '',
                'token'    => $code,
            );
            if (!empty($this->email)) {
                Mail::to($this->email)->send(new PasswordReset($senddata));
            }
            $data->verification_code = $code;
            $data->save();

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
    // rander method to view the component/
    public function render()
    {
        return view('livewire.front.auth.customers.customer-registration')->layout('layouts.web');
    }
}
