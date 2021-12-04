<?php

namespace App\Http\Livewire\Admin\Adds;

use App\Models\Add;
use Livewire\Component;

class CreateAdds extends Component
{


    public $title;
    public $description;
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
        $this->title = null;
        $this->description = null;
    }
    /* 
    value of the input fild
    */
    public function getModalId($item)
    {
        $this->item = $item;
        $fineBydata   = Add::find($item);
        $this->title  =  $fineBydata->title;
        $this->description   =  $fineBydata->description;
    }
    /*  
        validation rule
    */
    protected $rules = [
        'title'   => 'required|max:200|unique:adds,title',
        'description'   => 'required',
    ];
    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'title'   => 'required|max:200',
            'description'   => 'required',
        ]);

        if ($this->item) {
            Add::find($this->item)->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        } else {
            Add::create([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }
    /* 
    *   livewire view
    */

    public function render()
    {
        return view('livewire.admin.adds.create-adds');
    }
}
