<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\AskQuestion;
use App\Models\Contact;
use App\Models\Productreview;
use App\Models\Subscriber;
use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['refreshParent' => '$refresh'];
    public function render()
    {
        return view('livewire.admin.inc.sidebar', [
            'message' => Contact::where('notification', 0)->get(),
            'askQuestion' => AskQuestion::where('notification', 0)->get(),
            'productReview' => Productreview::where('notification', 0)->get(),
        ]);
    }
}
