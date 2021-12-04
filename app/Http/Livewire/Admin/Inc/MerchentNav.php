<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\AskQuestion;
use App\Models\Notification;
use App\Models\OrderItems;
use App\Models\Sitedefault;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchentNav extends Component
{

    protected $listeners = ['refreshParent' => '$refresh'];

    public function render()
    {
        return view('livewire.admin.inc.merchent-nav', [
            'setting' => Sitedefault::find(1),
            'notificationMsg' => Notification::where('status', 0)
                ->where('notification', 0)
                ->where('notification_for', 'merchent')->get(),
            'askquestionNotification' => AskQuestion::where('notification', 0)->where('shop_as', 'merchant')->where('shop_id', Auth::user()->id)->get(),
            'orderNotification' => OrderItems::where('product_by_shopid', Auth::user()->id)->where('shop_for', 'merchant')->where('notification', 0)->get()
        ]);
    }
}
