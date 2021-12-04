<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\Merchant;
use Livewire\Component;

class Shops extends Component
{
    public function render()
    {
        $datas = Merchant::all();
        return view('livewire.front.pages.shops', compact('datas'))->layout('layouts.web');
    }
}
