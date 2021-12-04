<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Image;
use Livewire\WithFileUploads;

class UserCreate extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $profile_photo_path;
    public $password;
    public $password_confirmation;
    public $user_role;



    /* 
    * action when click close button
    * action when click trush button 
    */
    public function close()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->emptyValue();
    }
    /*  
    validation rule
    */
    protected $rules = [
        'name'                  => 'required|max:50|unique:users,name',
        'email'                 => 'required|unique:users,email',
        'password'              => 'required|min:8',
        'password_confirmation' => 'same:password',
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
        $slug = str_replace(' ', '-', $this->name) . rand(10, 100);

        $validatedData = $this->validate();
        $queryData = new User;
        $queryData->name     = $this->name;
        $queryData->slug     = $slug;
        $queryData->email    = $this->email;
        $queryData->user_role  = '1'; 
        $queryData->user_as  = 'admin'; 
        $queryData->status  = 0; 
        $queryData->password = Hash::make($this->password);

        if (isset($this->profile_photo_path)) {
            $this->validate([
                'profile_photo_path' => 'image',
            ]);
            $imgName = $this->name . '-' . $this->profile_photo_path->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->profile_photo_path)
                ->save(public_path('uploads/User/' . $originalImgName));
            $queryData->profile_photo_path  = $originalImgName;
        }
        $queryData->save();
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('successalert', ['success' => 'User Created Successfully']);
        $this->dispatchBrowserEvent('closeModal');
        $this->emptyValue();
    }


    public function emptyValue()
    {

        $this->name               = NULL;
        $this->email              = NULL;
        $this->user_role          = NULL;
        $this->profile_photo_path = NULL;
    }


    public function render()
    {
        return view('livewire.admin.users.user-create');
    }
}
