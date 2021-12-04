<?php

namespace App\Http\Livewire\Front;

use App\Models\Service;
use Livewire\Component;

class SingleService extends Component
{
    public $data;
    function mount($slug)
    {
        $id = base64_decode($slug);
        $data = Service::where('id', $id)->first();
        if ($data) {
            $this->data = $data;
        } else {
            return abort(404);
        }
    }
    public function render()
    {
        return view('livewire.front.single-service')->layout('layouts.web');
    }
}
