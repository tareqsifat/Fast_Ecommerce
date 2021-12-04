<?php

namespace App\Http\Livewire\Admin\Attributs\Color;

use App\Models\ColorAttribut;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ColorCU extends Component
{
    public $color;
    public $name;

    public $item;
    protected $listeners = [
        'getModalId',
    ];
    /* 
    * action when click close button
    * action when click trush button 
     */
    public function close()
    {
        $this->item = null;
        $this->name = null;
        $this->color = null;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = ColorAttribut::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->color   =  $fineBydata->color;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function colorsave()
    {
        if (is_null($this->item)) {
            $this->validate([
                'name'   => 'required|max:200|unique:color_attributs,name',
                'color'   => 'required',
            ]);
            ColorAttribut::create([
                'name' => $this->name,
                'color' => $this->color,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            $this->validate([
                'name'   => 'required|max:200|unique:color_attributs,name,' . $this->item,
                'color'   => 'required',
            ]);
            ColorAttribut::find($this->item)->update([
                'name' => $this->name,
                'color' => $this->color,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }


    public function render()
    {
        return view('livewire.admin.attributs.color.color-c-u');
    }
}
