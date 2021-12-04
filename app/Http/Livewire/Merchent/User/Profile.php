<?php

namespace App\Http\Livewire\Merchent\User;

use Livewire\Component;

class Profile extends Component
{


    public $changeFiled = false;
    public function chageAction($action)
    {
        if ($action == 'chagepass') {
            $this->changeFiled = true;
        } elseif ($action == 'general') {
            $this->changeFiled = false;
        }
    }

    public function render()
    {
        return view('livewire.merchent.user.profile');
    }
}
