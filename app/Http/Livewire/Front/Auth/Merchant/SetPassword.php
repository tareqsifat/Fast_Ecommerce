<?php

namespace App\Http\Livewire\Front\Auth\Merchant;

use Livewire\Component;

class SetPassword extends Component
{
    public function render()
    {
        return view('livewire.front.auth.merchant.set-password')->layout('layouts.web');
    }
}
