<?php

namespace App\Http\Livewire\Front\Inc;

use App\Models\Topbar;
use Livewire\Component;

class Header extends Component
{
    public function openSidebar()
    {
        $this->emit('openAction');
    }
    public function render()
    {
        $topItems = Topbar::first();
        return view('livewire.front.inc.header', compact(['topItems']))->layout('layouts.app');
    }
}
