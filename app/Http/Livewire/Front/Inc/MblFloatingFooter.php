<?php

namespace App\Http\Livewire\Front\Inc;

use Livewire\Component;

class MblFloatingFooter extends Component
{
    public function open()
    {
        $this->emit('openAction');
    }

    protected $listeners = ['refreshParent' => '$refresh'];
    public function render()
    {
        return view('livewire.front.inc.mbl-floating-footer');
    }
}
