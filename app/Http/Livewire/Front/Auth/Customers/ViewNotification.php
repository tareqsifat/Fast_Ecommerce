<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\SendMessaage;
use Livewire\Component;

class ViewNotification extends Component
{
    public $item;
    function mount($data)
    {
        $getItemData = SendMessaage::where('id', $data)->first();
        if ($getItemData) {
            $this->item = $data;
        } else {
            return abort(404);
        }
    }

    public function render()
    {
        $getItemData = SendMessaage::where('id', $this->item)->first();
        return view('livewire.front.auth.customers.view-notification', compact('getItemData'))->layout('layouts.web');
    }
}
