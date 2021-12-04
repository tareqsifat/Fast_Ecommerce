<?php

namespace App\Http\Livewire\Front\Auth\Customers\Profile;

use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class Layouts extends Component
{
    use WithFileUploads;
    public $profile_photo_path;
    public $oldProfile_photo_path;
    public function mount()
    {
        $this->oldProfile_photo_path = Auth::user()->profile_photo_path;
    }
    public function changeprofile()
    {
        $this->validate([
            'profile_photo_path' => 'max:2024'
        ]);
        $userData  = Customers::where('id', Auth::user()->id)->first();
        if ($userData) {
            if (file_exists("uploads/user/$userData->profile_photo_path")) {
                File::delete("uploads/user/$userData->profile_photo_path");
            };
            $thumbName = 'customers' . '-' . $userData->id . '/' . $this->profile_photo_path->getClientOriginalName();
            $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
            Image::make($this->profile_photo_path)->save("uploads/user/$originalThumbName");
            $userData->profile_photo_path = $originalThumbName;
            $this->oldProfile_photo_path = $originalThumbName;
            $userData->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
            $this->profile_photo_path = null;
            $this->emit('refreshPa\rent');
        } else {
            return abort(404);
        }
    }
    public function removepreview($action)
    {
        if ($action == 'profile_photo_path') {
            $this->profile_photo_path = null;
        }
    }
    public function render()
    {
        return view('livewire.front.auth.customers.profile.layouts');
    }
}
