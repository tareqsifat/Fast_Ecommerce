<?php

namespace App\Http\Livewire\Admin\Users\Customer;

use App\Models\Customers;
use App\Models\User;
use Livewire\Component;

class ViewCustomer extends Component
{

    public $data;
    public $item;
    protected $listeners = [
        'getModalId',
    ];

    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        if ($itemIdentity) {
            $this->data = Customers::where('id', $itemIdentity)->first();
        } else {
            return back();
        }
    }

    public function close()
    {
        $this->item = null;
    }

    public function render()
    {
        return view('livewire.admin.users.customer.view-customer');
    }
}
