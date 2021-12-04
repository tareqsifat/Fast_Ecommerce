<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\AdminNotification;
use App\Models\AskQuestion;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Productreview;
use App\Models\Sitedefault;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Merchant;
use Livewire\Component;

class Nav extends Component
{
    protected $listeners = ['refreshParent' => '$refresh'];
    public $searchQuery;
    public function submitSearch()
    {
        if (!is_null($this->searchQuery)) {
            return redirect()->route('admin.products.search', $this->searchQuery);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "Opps Please input Product Code"]);
        }
    }






    public function render()
    {
        return view('livewire.admin.inc.nav', [
            'setting' => Sitedefault::find(1),
            'customers' => User::where('notification', 0)->where('user_as', 'user')->get(),
            'message' => Contact::where('notification', 0)->get(),
            'merchent' => Merchant::where('notification', 0)->get(),
            'orders' => Order::where('notification', 0)->get(),
            'askquestions' => AskQuestion::where('notification', 0)->get(),
            'productReview' => Productreview::where('notification', 0)->get(),
            'OrderCancelNofification' => AdminNotification::where('notification', 0)->where('message_for', 'orders_cancel')->get(),
            'subscriber' => Subscriber::where('status', 0)->get(),
        ]);
    }
}
