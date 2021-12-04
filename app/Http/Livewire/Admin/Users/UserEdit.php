<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Image;
use Livewire\WithFileUploads;

class UserEdit extends Component
{
    // properties 
    use WithFileUploads;
    public $name;
    public $email;
    public $profile_photo_path;
    public $password;
    public $password_confirmation;
    public $user_role;
    public $oldimage;
    public $item;

    protected $listeners = [
        'getModalId',
    ];

    /* 
      value of the input fild
      */
    public function getModalId($item)
    {
        $itemIdentity    = $this->item = $item;
        $fineBydata      = User::find($itemIdentity);
        $this->name      = $fineBydata->name;
        $this->email     = $fineBydata->email;
        $this->user_role = $fineBydata->user_role;
        $this->oldimage  = $fineBydata->profile_photo_path;
    }


    /* 
           * action when click close button
           * action when click trush button 
           */
    public function close()
    {
        $this->emptyValue();
    }
    /* 
           * save data into database 
           * update data into database
           */
    public function update()
    {
        $validatedData     = $this->validate([
            'name'  => 'required|max:50|unique:users,name,' . $this->item,
            'email' => 'required|email|unique:users,email,' . $this->item,
        ]);

        $itemIdentity    = $this->item;
        $data            = User::find($itemIdentity);
        $data->name      = $this->name;
        $data->email     = $this->email;
        $data->user_role = $this->user_role;
        if (isset($this->password)) {
            $this->validate([
                'password'              => 'min:8',
                'password_confirmation' => 'min:8|same:password',
            ]);
            $data->password  = Hash::make($this->password);
        }
        if (isset($this->profile_photo_path)) {
            $this->validate([
                'profile_photo_path' => 'image',
            ]);
            if (isset($data->profile_photo_path)) {
                $unlinkimg = $data->profile_photo_path;
                if (file_exists("uploads/user/$unlinkimg")) {
                    unlink("uploads/user/$unlinkimg");
                }
            }
            $imgName = $this->name . $this->profile_photo_path->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->profile_photo_path)
                ->save('uploads/user/' . $originalImgName);

            $data->profile_photo_path  = $originalImgName;
        }
        $data->save();
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
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
        return view('livewire.admin.users.user-edit');
    }
}
