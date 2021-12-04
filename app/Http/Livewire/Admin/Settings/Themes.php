<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

class Themes extends Component
{


    public $addToCartColor;

    public function saveItem($sction)
    {
    }
    public function render()
    {
        return view('livewire.admin.settings.themes');
    }
}
