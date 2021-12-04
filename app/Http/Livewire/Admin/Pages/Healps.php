<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;
use Livewire\Component;

class Healps extends Component
{

    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $did = Faq::find($id);
        if ($did) {
            Faq::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        }
    }


    public function save(Request $request)
    {
        $data = Page::where('title', 'healps')->first();
        $data->description = $request->description;
        $data->save();
        return back();
    }
    public function render()
    {
        $globalfaq = Faq::where('faq_for', 'global')->where('status', 0)->get();
        $findpage = Page::where('title', 'healps')->first();
        return view('livewire.admin.pages.healps', compact(['findpage', 'globalfaq']));
    }
}
