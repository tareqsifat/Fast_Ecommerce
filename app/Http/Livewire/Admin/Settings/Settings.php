<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Sitedefault;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class Settings extends Component
{


    // Properties 
    use WithFileUploads;
    public $title;
    public $logo;
    public $favicon;
    public $copyright;
    public $sitedescription;
    public $menuebackground;
    public $bodybackground;
    public $item;
    public $email;
    public $phone;
    public $address;
    public $logoinstance;
    public $faviconinstance;
    public $resetmenuebackground;


    public function __construct()
    {
        $data = Sitedefault::first();
        $this->title = $data->title;
        $this->copyright = $data->copyright;
        $this->sitedescription = $data->sitedescription;
        $this->menuebackground = $data->menuebackground;
        $this->bodybackground = $data->bodybackground;
        $this->email = $data->email;
        $this->phone = $data->phone;
        $this->address = $data->address;
    }

    public function saveItem($action)
    {
        // fetch data from database 
        $data = Sitedefault::first();
        if ($action == 'title') {
            $data->title = $this->title;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Title Save Successfully']);
        } elseif ($action == 'saveLogo') {
            // valo validation and condation
            if (!is_null($this->logo)) {
                $this->validate([
                    'logo'   => 'image|max:2048',
                ]);
                if (isset($data->logo)) {
                    // store file  
                    if (file_exists("uploads/logo/$data->logo")) {
                        File::delete("uploads/logo/$data->logo");
                    };
                }
                $imgName = $this->logo->getClientOriginalName();
                $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
                Image::make($this->logo)->save("uploads/logo/$originalImgName");
                $data->logo  = $originalImgName;
                $data->save();
                $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
                $this->logoinstance++;
            } else {
                $this->dispatchBrowserEvent('warningAlert', ['warning' => 'please choose a file']);
            }
        } elseif ($action == 'savefavicon') {
            // favicon 
            if (isset($this->favicon)) {
                $this->validate([
                    'favicon'   => 'image|max:2048',
                ]);
                if (isset($data->favicon)) {
                    if (file_exists("uploads/favicon/$data->favicon")) {
                        unlink("uploads/favicon/$data->favicon");
                    };
                }
                $imgName = $this->favicon->getClientOriginalName();
                $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
                Image::make($this->favicon)->save("uploads/favicon/$originalImgName");
                $data->favicon  = $originalImgName;
                $data->save();
                $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
                $this->faviconinstance++;
            } else {
                $this->dispatchBrowserEvent('warningAlert', ['warning' => 'please choose a file']);
            }
        } elseif ($action == 'copyright') {
            // copyright section 
            $data->copyright = $this->copyright;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Copyright Save Successfully']);
        } elseif ($action == 'sitedescription') {
            // site description 
            $this->validate([
                'sitedescription'   => 'max:5000',
            ]);
            $data->sitedescription = $this->sitedescription;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Site Description Save Successfully']);
        } elseif ($action == 'menuebackground') {
            // menue background 
            $data->menuebackground = $this->menuebackground;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'resetmenuebackground') {
            // reset menue background 
            $data->menuebackground = '';
            $data->save();
            $this->menuebackground = '';
            $this->dispatchBrowserEvent('successalert', ['success' => 'Reset Successfully']);
        } elseif ($action == 'bodybackground') {
            // body background 
            $data->bodybackground = $this->bodybackground;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'bodybackground_reset') {
            //reset body background 
            $data->bodybackground = '';
            $data->save();
            $this->bodybackground = '';
            $this->dispatchBrowserEvent('successalert', ['success' => 'Reset Successfully']);
        } elseif ($action == 'email') {
            // set action email 
            $data->email = $this->email;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'phone') {
            // set action phone 
            $data->phone = $this->phone;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'address') {
            // set action address 
            $data->address = $this->address;
            $data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        }
    }

    // render method 
    public function render()
    {
        $datas = Sitedefault::first();
        return view('livewire.admin.settings.settings', compact(['datas']));
        if (Auth::user()->user_role == 0) {
        } else {
            return abort('404');
        }
    }
}
