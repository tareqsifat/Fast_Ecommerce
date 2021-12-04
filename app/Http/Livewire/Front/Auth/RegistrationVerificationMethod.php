<?php

namespace App\Http\Livewire\Front\Auth;

use App\Mail\PasswordReset;
use App\Models\Customers;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RegistrationVerificationMethod extends Component
{
    public $search;
    public $message;
    public $phone;
    public $email;
    public $phoneCheck;
    public $fUser = NULL;
    public $activeForm = true;

    public function search()
    {
        $fUser = Customers::where('phone', $this->search)->first();
        $dbMerchantdata = Merchant::where('phone', $this->search)->first();
        if ($fUser) {
            $this->fUser = $fUser;
        } elseif ($dbMerchantdata) {
            $this->fUser = $dbMerchantdata;
        } else {
            $this->message = 'User not found';
        }
    }
    // next view if user exists 
    public function next($phone)
    {
        $this->phoneCheck = $phone;
        $this->activeForm = false;
    }

    // action if user is not account 
    public function notAccount()
    {
        $this->fUser = NULL;
        $this->search = NULL;
    }
    // send verification via email or phone 
    public function verify()
    {
        $code = rand(1111, 9999);
        $data = array(
            'subject' => 'Verification Code',
            'message' => '',
            'token'    => $code,
        );
        if (!empty($this->phone) || !empty($this->email)) {
            $dbCustomerdata = Customers::where('phone', $this->phoneCheck)->first();
            $dbMerchantdata = Merchant::where('phone', $this->phoneCheck)->first();
            if (!empty($this->phone)) {
                if ($dbCustomerdata) {
                    $dbCustomerdata->verification_code = $code;
                    $dbCustomerdata->save();
                    $url = "http://api.greenweb.com.bd/api.php?json";
                    $send_smsdata = array(
                        'to' => $dbCustomerdata->phone,
                        'message' => "$code Fast Deals Verification code",
                        'token' => "9fe4dec45c593c4c77324743ca474868"
                    ); // Add parameters in key value
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send_smsdata));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);
                } elseif ($dbMerchantdata) {
                    $dbMerchantdata->verification_code = $code;
                    $dbMerchantdata->save();
                    $url = "http://api.greenweb.com.bd/api.php?json";
                    $send_smsdata = array(
                        'to' => $dbMerchantdata->phone,
                        'message' => "$code Fast Deals Verification code",
                        'token' => "9fe4dec45c593c4c77324743ca474868"
                    ); // Add parameters in key value
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send_smsdata));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);
                } else {
                    $this->message = 'Oppes Somethings Went Wrong! Please Check Again';
                }
            }
            if (!empty($this->email)) {
                if ($dbCustomerdata) {
                    $dbCustomerdata = Customers::where('phone', $this->phoneCheck)->first();
                    Mail::to($dbCustomerdata->email)->send(new PasswordReset($data));
                    $dbCustomerdata->verification_code = $code;
                    $dbCustomerdata->save();
                } elseif ($dbMerchantdata) {
                    if ($dbCustomerdata) {
                        $dbCustomerdata = Merchant::where('phone', $this->phoneCheck)->first();
                        Mail::to($dbCustomerdata->email)->send(new PasswordReset($data));
                        $dbCustomerdata->verification_code = $code;
                        $dbCustomerdata->save();
                    } else {
                        $this->message = 'Oppes Somethings Went Wrong! Please Check Again';
                    }
                }
            }
            session(['verification_code' => $code]);
            return redirect(route('post.otp'));
        } else {
            $this->message = 'pleace select verification method';
        }
    }


    // render method to view the component 
    public function render()
    {
        return view('livewire.front.auth.registration-verification-method')->layout('layouts.web');
    }
}
