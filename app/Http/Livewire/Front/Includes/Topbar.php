<?php

namespace App\Http\Livewire\Front\Includes;

use App\Models\Social;
use App\Models\Topbar as ModelsTopbar;
use Livewire\Component;

class Topbar extends Component
{
    public function render()
    {
        $data = ModelsTopbar::first();
        $socialIcon = Social::where('status', 0)->paginate(4);
        return view('livewire.front.includes.topbar', compact('data', 'socialIcon'));
    }
}
