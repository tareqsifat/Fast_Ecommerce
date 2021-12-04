<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\Sitedefault;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.admin.inc.footer', [
            'setting' => Sitedefault::find(1)
        ]);
    }
}
