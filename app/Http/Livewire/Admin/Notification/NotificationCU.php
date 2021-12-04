<?php

namespace App\Http\Livewire\Admin\Notification;

use App\Models\Notification;
use Livewire\Component;

class NotificationCU extends Component
{
    public $title;
    public $slug;
    public $body;
    public $notification_for;
    public $message_type;
    public $user_id;
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
        $this->body = null;
        $this->notification_for  = null;
        $this->message_type  = null;
        $this->user_id  = null;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Notification::find($itemIdentity);
        $this->title   =  $fineBydata->title;
        $this->body   =  $fineBydata->body;
        $this->notification_for   =  $fineBydata->notification_for;
        $this->message_type   =  $fineBydata->message_type;
        $this->user_id   =  $fineBydata->user_id;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'title'   => 'required|max:200|unique:notifications,title,' . $this->item,
            'body'   => 'max:2000',
            'message_type'   => 'required',
            'notification_for'   => 'required',
        ]);
        // Chake Image if exists 

        // check Id if Exists
        if (is_null($this->item)) {
            Notification::create([
                'title' => $this->title,
                'slug' => str_replace(' ', '-', $this->title),
                'body' => $this->body,
                'user_id' => $this->user_id,
                'notification_for' => $this->notification_for,
                'message_type' => $this->message_type,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            Notification::find($this->item)->update([
                'user_id' => $this->user_id,
                'title' => $this->title,
                'slug' => str_replace(' ', '-', $this->title),
                'body' => $this->body,
                'notification_for' => $this->notification_for,
                'message_type' => $this->message_type,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
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
        return view('livewire.admin.notification.notification-c-u');
    }
}
