<?php

namespace App\Http\Livewire\Admin\Header;

use App\Models\Topbar;
use Livewire\Component;
use tidy;

class HeaderTop extends Component
{
    public $phone;
    public $email;
    public $url;
    public $button;
    public $data;
    public $header_bg;
    public $header_text_color;
    public $header_icon_color;
    public $header_hover_color;

    public function __construct()
    {
        $this->data   = $data = Topbar::first();
        $this->phone  = $data->phone;
        $this->email  = $data->email;
        $this->button = $data->button;
        $this->url    = $data->url;
        $this->header_bg          = $data->header_bg;
        $this->header_text_color  = $data->header_text_color;
        $this->header_icon_color  = $data->header_icon_color;
        $this->header_hover_color = $data->header_hover_color;
    }


    // action 

    public function saveItem($action)
    {
        if ($action == 'phone') {
            // action in phone 
            $this->data->phone = $this->phone;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'email') {
            // action in email
            $this->data->email = $this->email;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'button') {
            // action in button
            $this->data->button = $this->button;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'url') {
            // action in url
            $this->data->url = $this->url;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_bg') {
            // action in header_bg
            $this->data->header_bg = $this->header_bg;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_bg_reset') {
            // reset action in header_bg
            $this->data->header_bg = '';
            $this->data->save();
            $this->header_bg = '';
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_text_color') {
            // action in header_text_color
            $this->data->header_text_color = $this->header_text_color;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_text_color_reset') {
            // reset action in header_text_color
            $this->data->header_text_color = '';
            $this->data->save();
            $this->header_text_color = '';
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_icon_color') {
            // reset action in header_icon_color
            $this->data->header_icon_color = $this->header_icon_color;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_icon_color_reset') {
            // reset action in header_icon_color
            $this->data->header_icon_color = '';
            $this->data->save();
            $this->header_icon_color = '';
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_hover_color') {
            // action in header_hover_color
            $this->data->header_hover_color = $this->header_hover_color;
            $this->data->save();
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } elseif ($action == 'header_hover_color_reset') {
            // reset action in header_hover_color
            $this->data->header_hover_color = '';
            $this->data->save();
            $this->header_hover_color = '';
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        }
    }


    public function render()
    {
        return view('livewire.admin.header.header-top');
    }
}
