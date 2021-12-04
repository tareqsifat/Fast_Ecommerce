<?php

namespace App\Http\Livewire\Merchent\User;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class MerchentGeneralProfile extends Component
{
    use WithFileUploads;
    public $shop_name;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $nid;
    public $tid;
    public $profile_photo_path;
    public $oldnid;
    public $oldtid;
    public $oldprofile_photo_path;
    public $description;
    public $changeField = true;
    // mount to prerandering the component 
    public function mount()
    {
        $auth = Auth::user();
        $this->shop_name = $auth->name;
        $this->first_name = $auth->first_name;
        $this->last_name = $auth->last_name;
        $this->email = $auth->email;
        $this->phone = $auth->phone;
        $this->description = $auth->description;
        $this->oldnid = $auth->nid;
        $this->oldtid = $auth->tid;
        $this->oldprofile_photo_path = $auth->profile_photo_path;
    }

    // action in condition 
    public function actionItem($action)
    {
        if ($action == 'nid') {
            $this->nid = null;
        } elseif ($action == 'tid') {
            $this->tid = null;
        } elseif ($action == 'profile_photo_path') {
            $this->profile_photo_path = null;
        }
    }

    // save input data 

    public function save()
    {
        $this->validate([
            'shop_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'nid' => 'max:1024',
            'tid' => 'max:1024',
        ], [
            'shop_name.required' => 'The field is required',
        ]);

        $data = Merchant::where('id',  Auth::user()->id)->first();
        if ($data) {
            $data->name = $this->shop_name;
            $data->first_name = $this->first_name;
            $data->last_name = $this->last_name;
            $data->email = $this->email;
            $data->phone = $this->phone;
            $data->description = $this->description;
            if (!is_null($this->profile_photo_path)) {
                $this->validate([
                    'profile_photo_path' => 'image|max:512|dimensions:ratio=1/1',
                ], [
                    'profile_photo_path.dimensions' => 'Profile Image must be height and width will be equal Example:500px X 500px',
                ]);
                if (file_exists("uploads/user/profile/$data->profile_photo_path")) {
                    File::delete("uploads/user/profile/$data->profile_photo_path");
                };
                $thumbName = 'merchent' . '-' . $data->id . '/' . $this->profile_photo_path->getClientOriginalName();
                $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
                Image::make($this->profile_photo_path)->save("uploads/user/profile/$originalThumbName");
                $data->profile_photo_path = $originalThumbName;
                $this->oldprofile_photo_path = $originalThumbName;
            }
            if (!is_null($this->nid)) {
                $this->validate([
                    'nid' => 'image|max:512',
                ]);
                if (file_exists("uploads/user/profile/nid/$data->nid")) {
                    File::delete("uploads/user/profile/nid/$data->nid");
                };

                $thumbName = 'NID' . '-' . $data->id . '/' . $this->nid->getClientOriginalName();
                $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
                Image::make($this->nid)->save("uploads/user/profile/nid/$originalThumbName");
                $data->nid = $originalThumbName;
                $this->oldnid = $originalThumbName;
            }
            if (!is_null($this->tid)) {
                $this->validate([
                    'tid' => 'image|max:512',
                ]);
                if (file_exists("uploads/user/profile/tid/$data->tid")) {
                    File::delete("uploads/user/profile/tid/$data->tid");
                };

                $thumbName = 'TID' . '-' . $data->id . '/' . $this->tid->getClientOriginalName();
                $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
                Image::make($this->tid)->save("uploads/user/profile/tid/$originalThumbName");
                $this->oldtid = $originalThumbName;
                $data->tid = $originalThumbName;
            }
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
            $this->emptyField();
        } else {
            return abort(404);
        }
    }

    // empty all field data 

    public function emptyField()
    {
        $this->profile_photo_path = NULL;
        $this->nid = NULL;
        $this->tid = NULL;
    }
    // render to view the component 
    public function render()
    {
        return view('livewire.merchent.user.merchent-general-profile');
    }
}
