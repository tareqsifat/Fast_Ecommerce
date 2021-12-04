<?php

namespace App\Http\Livewire\Front\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Mail\PasswordReset;
use App\Models\Customers;
use App\Models\Merchant;
use Illuminate\Support\Facades\Mail;

class OtpConfirmation extends Component
{
    public $verification_code;
    public $email;
    public $phone;
    public $message;
    public $password;
    public $password_confirmation;

    public function resendverifyCode()
    {
        $code = rand(1111, 9999);
        $data = array(
            'subject' => 'forget Password',
            'message' => '',
            'token'    => $code,
        );
        $customer = Customers::where('verification_code', session()->get('verification_code'))->first();
        $merchant = Merchant::where('verification_code', session()->get('verification_code'))->first();
        if ($customer) {
            $customer->verification_code = $code;
            $customer->save();
            if (!empty($customer->phone)) {
                $url = "http://api.greenweb.com.bd/api.php?json";
                $send_smsdata = array(
                    'to' => $customer->phone,
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
            if (!empty($customer->email)) {
                Mail::to($customer->email)->send(new PasswordReset($data));
            }
            $this->dispatchBrowserEvent('successalert', ['success' => 'A message send your phone or email']);
            session(['verification_code' => $code]);
        } elseif ($merchant) {
            $merchant->verification_code = $code;
            $merchant->save();
            if (!empty($merchant->phone)) {
                $url = "http://api.greenweb.com.bd/api.php?json";
                $send_smsdata = array(
                    'to' => $merchant->phone,
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
            if (!empty($merchant->email)) {
                Mail::to($merchant->email)->send(new PasswordReset($data));
            }
            $this->dispatchBrowserEvent('successalert', ['success' => 'A message send your phone or email']);
            session(['verification_code' => $code]);
        } else {
            return redirect(route('verify.method'));
        }
    }
    // verify and login 
    public function verify()
    {
        $this->validate([
            'verification_code' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $customer = Customers::where('verification_code', $this->verification_code)->first();
        $merchant = Merchant::where('verification_code', $this->verification_code)->first();
        if ($customer) {
            $customer->verification_code = NULL;
            $customer->verify_status = 1;
            $customer->password = Hash::make($this->password);
            $customer->save();
            Auth::login($customer);
            return redirect(route('home'));
        } elseif ($merchant) {
            $merchant->verification_code = NULL;
            $merchant->verify_status = 1;
            $merchant->password = Hash::make($this->password);
            $merchant->save();
            Auth::login($merchant);
            return redirect(route('merchent.dashboard'));
        } else {
            $this->message = 'Invalid Code given';
        }
    }

    // render method to view component 
    public function render()
    {
        return view('livewire.front.auth.otp-confirmation')->layout('layouts.web');
    }
}
