<?php

namespace App\Http\Livewire\Front\Inc;

use App\Models\SendMessaage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DefaulSidebar extends Component
{

    public function render()
    {
        if (Auth::user()) {
            $notification = SendMessaage::where('user_id', Auth::user()->id)->where('notification', 0)->get();
        } else {
            $notification = [];
        }
        return view('livewire.front.inc.defaul-sidebar', [
            'notification' => $notification,
        ])->layout('layouts.web');
    }
}
