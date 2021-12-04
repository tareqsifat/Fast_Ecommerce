<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class UserProfile extends Component
{
    use WithFileUploads;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $profile_photo_path;
    public $oldprofile_photo_path;
    public $description;
    public $changeField = true;


    public $oldPassword;
    public $password;
    public $password_confirmation;
    public $message;

    public function mount($id)
    {
        $auth = Auth::user();
        $this->first_name = $auth->first_name;
        $this->last_name = $auth->last_name;
        $this->email = $auth->email;
        $this->phone = $auth->phone;
        $this->description = $auth->description;
        $this->oldprofile_photo_path = $auth->profile_photo_path;
    }
    public function actionItem($action)
    {
        if ($action == 'profile_photo_path') {
            $this->profile_photo_path = null;
        }
    }
    public function save()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'profile_photo_path' => 'max:1024',
        ]);

        $data = User::where('id',  Auth::user()->id)->first();
        if ($data) {
            $data->first_name = $this->first_name;
            $data->last_name = $this->last_name;
            $data->email = $this->email;
            $data->phone = $this->phone;
            $data->description = $this->description;
            if (!is_null($this->profile_photo_path)) {
                // $this->validate([
                //     'profile_photo_path' => 'image|max:512|dimensions:height=300,width=300',
                // ], [
                //     'profile_photo_path.dimensions' => 'Profile Image must be height 300px and width 300px',
                // ]);
                if (file_exists("uploads/user/profile/$data->profile_photo_path")) {
                    File::delete("uploads/user/profile/$data->profile_photo_path");
                };
                $thumbName = 'user' . '-' . $data->id . '/' . $this->profile_photo_path->getClientOriginalName();
                $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
                Image::make($this->profile_photo_path)->save("uploads/user/profile/$originalThumbName");
                $data->profile_photo_path = $originalThumbName;
                $this->oldprofile_photo_path = $originalThumbName;
            }

            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
            $this->emptyField();
        } else {
            return abort(404);
        }
    }

    public function changePassword()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $this->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);
        if (Hash::check($this->oldPassword, $user->password)) {
            $user->Password =  Hash::make($this->password);
            $user->save();
            Auth::logout();
            return redirect('/login');
        } else {
            $this->message = "password not match ";
        }
    }


    public function emptyField()
    {
        $this->profile_photo_path = NULL;
    }
    public function render()
    {
        return view('livewire.admin.users.user-profile');
    }
}
