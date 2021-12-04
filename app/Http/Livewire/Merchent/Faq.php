<?php

namespace App\Http\Livewire\Merchent;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        $datas = ModelsFaq::where('status', 0)->where('faq_for', 'merchent')->get();
        return view('livewire.merchent.faq', compact('datas'));
    }
}
