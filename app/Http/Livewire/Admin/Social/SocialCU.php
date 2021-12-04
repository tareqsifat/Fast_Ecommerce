<?php

namespace App\Http\Livewire\Admin\Social;

use App\Models\Social;
use Livewire\Component;

class SocialCU extends Component
{


    public $name;
    public $icon;
    public $url;
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
        $this->name  = null;
        $this->icon  = null;
        $this->url   = null;
        $this->item   = null;
    }

    /* 
    value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Social::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->icon   =  $fineBydata->icon;
        $this->url    =  $fineBydata->url;
    }
    /*  
        validation rule
    */
    protected $rules = [
        'name'   => 'required|max:20',
        'icon'   => 'required',
        'url'    => 'required|url',
    ];

    /*     
    * live validation preview
    */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $validatedData = $this->validate();
        if ($this->item == true) {
            Social::find($this->item)->update($validatedData);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        } else {
            Social::create($validatedData);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->close();
    }

    /* 
    *   livewire view
    */
    public function render()
    {
        return view('livewire.admin.social.social-c-u');
    }
}
