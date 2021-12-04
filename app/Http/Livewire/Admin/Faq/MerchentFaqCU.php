<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;

class MerchentFaqCU extends Component
{

    public $title;
    public $slug;
    public $faq_for;
    public $description;
    public $item;
    public $iteration;

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
        $this->faq_for = null;
        $this->description = null;
        $this->iteration++;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Faq::find($itemIdentity);
        $this->title   =  $fineBydata->title;
        $this->description   =  $fineBydata->description;
        $this->faq_for   =  $fineBydata->faq_for;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'title'   => 'required|max:200|unique:faqs,title,' . $this->item,
            'description'   => 'required',
            'faq_for'   => 'required',
        ]);
        // check Id if Exists
        if (is_null($this->item)) {
            Faq::create([
                'title' => $this->title,
                'slug' => str_replace(' ', '-', $this->title),
                'faq_for' => $this->faq_for,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            Faq::find($this->item)->update([
                'title' => $this->title,
                'slug' => str_replace(' ', '-', $this->title),
                'faq_for' => $this->faq_for,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }

    /** 
     * removepreviewThumb
     * @return \Illuminate\Http\Response
     */

    public function removepreviewThumb()
    {
        $this->faq_for = Null;
        $this->iteration++;
    }

    /* 
    *   livewire view
    */

    public function render()
    {
        return view('livewire.admin.faq.merchent-faq-c-u');
    }
}
