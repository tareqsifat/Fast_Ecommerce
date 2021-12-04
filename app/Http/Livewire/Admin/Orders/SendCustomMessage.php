<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Mail\CustomerInfoMail;
use App\Models\Order;
use App\Models\SendMessaage;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SendCustomMessage extends Component
{
    public $phone;
    public $email;
    public $message;
    public $orderData;
    public $orderId;
    public $item;
    public $ordermessage;
    public $user_id;
    public $messsage_type;

    protected $listeners = [
        'getModalId',
    ];

    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $this->item = $item;
        $orderDatas = Order::where('id', $item)->first();
        if ($orderDatas) {
            $this->user_id = $orderDatas->user_id;
            $this->orderData = $orderDatas;
            $this->phone = $orderDatas->phone;
            $this->email = $orderDatas->email;
            $this->orderId = $orderDatas->orderId;
        } else {
            return back();
        }
        $this->ordermessage = SendMessaage::where('order_id', $this->item)->get();
    }
    // send message method 
    public function sendMessage()
    {
        $this->validate([
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:100',
            'messsage_type' => 'required',
        ]);

        $data = SendMessaage::create([
            'user_id' => $this->user_id,
            'order_id' => $this->orderData->id,
            'phone' => $this->phone,
            'email' => $this->email,
            'message_for' => 'shipping_info',
            'message' => $this->message,
        ]);
        if ($this->messsage_type == 'info') {
            $otmessage = "Please check $this->orderId order info on your www.fastdeals.me account";
        } else {
            $otmessage = "your $this->orderId order is cancel";
        }
        $senddata = array(
            'subject' => $otmessage,
            'message' => $this->message,
            'token'    => NULL,
        );
        if (!empty($this->email)) {
            if ($this->messsage_type == 'info') {
                Mail::to($this->email)->send(new CustomerInfoMail($senddata));
            } else {
                Mail::to($this->email)->send(new PasswordReset($senddata));
            }
        }

        $url = "http://api.greenweb.com.bd/api.php?json";
        $send_smsdata = array(
            'to' => $this->phone,
            'message' => $otmessage,
            'token' => "9fe4dec45c593c4c77324743ca474868"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send_smsdata));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Message Send Successfully']);
        $this->close();
    }

    public function delteOrdmessage($id)
    {
        $deldata = SendMessaage::find($id);
        if ($deldata) {
            $deldata->destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "Opps somrthings Wrong Please Try again"]);
        }
    }
    public function close()
    {
        $this->phone = null;
        $this->email = null;
        $this->message = null;
        $this->item = null;
        $this->dispatchBrowserEvent('closeModal');
    }

    // render  method to view the component 
    public function render()
    {
        return view('livewire.admin.orders.send-custom-message');
    }
}
