<?php

namespace App\Http\Livewire\Admin\Notification;

use App\Models\Notification;
use App\Models\NotificationTrack;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReadNotification extends Component
{
    public $data;

    // mount method 
    function mount($data)
    {
        $this->data = Notification::find($data);
        if ($this->data) {
            $datacheck =   NotificationTrack::where('user_id', Auth::user()->id)->where('notification_id', $data)->first();
            if ($datacheck) {
            } else {
                NotificationTrack::create([
                    'user_id' => Auth::user()->id,
                    'notification_id' => $data,
                ]);
            }
        }
    }

    // delete notification Item 
    public function delete($id)
    {
        $datacheck =   NotificationTrack::find($id);
        if ($datacheck) {
            NotificationTrack::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        };
    }


    // render method to view the Component
    public function render()
    {
        return view('livewire.admin.notification.read-notification', [
            'notificationMsg' => NotificationTrack::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get(),
        ]);
    }
}
