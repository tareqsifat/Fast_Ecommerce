<?php

namespace App\Http\Livewire\Admin\Headline;

use App\Models\Headline as ModelsHeadline;
use Livewire\Component;
use Symfony\Component\VarDumper\Cloner\Data;

class Headline extends Component
{


    public $headline;
    public $speed;
    public $color;
    public $behavior;
    public $direction;

    public function mount()
    {
        $data = ModelsHeadline::first();
        if ($data) {
            $this->headline = $data->text;
            $this->speed = $data->speed;
            $this->color = $data->color;
            $this->behavior = $data->behavior;
            $this->direction = $data->direction;
        }
    }

    public function save()
    {
        $this->validate([
            'headline' => 'required',
        ]);

        $data = ModelsHeadline::first();
        if ($data) {
            $data->text = $this->headline;
            $data->speed = $this->speed;
            $data->color = $this->color;
            $data->behavior = $this->behavior;
            $data->direction = $this->direction;
            $data->save();
        } else {
            $data = new ModelsHeadline;
            $data->text = $this->headline;
            $data->speed = $this->speed;
            $data->color = $this->color;
            $data->behavior = $this->behavior;
            $data->direction = $this->direction;
            $data->save();
        }

        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
    }

    // chante status to on and of the headline
    public function changeStatus($id)
    {
        $data = ModelsHeadline::find($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        $data->save();
        $this->dispatchBrowserEvent('successalert', ['success' => 'Change Successfully']);
    }
    // render method to view the componet 
    public function render()
    {
        return view('livewire.admin.headline.headline');
    }
}
