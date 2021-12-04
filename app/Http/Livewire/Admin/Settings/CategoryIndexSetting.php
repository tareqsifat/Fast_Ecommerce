<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Category;
use App\Models\Categoryindex;
use App\Models\Sitedefault;
use Livewire\Component;

class CategoryIndexSetting extends Component
{
    public $newCountData = [];

    function add($i)
    {
        array_push($this->newCountData, $i);
    }
    public function remove($i)
    {
        unset($this->newCountData[$i]);
    }

    public function save()
    {
        foreach ($this->newCountData as $key => $value) {
            Category::find($this->newCountData[$key])->update(
                [
                    'index_no' => $key,
                ]
            );
        }
        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        $this->newCountData = [];
    }
    public function removeOld($data)
    {
        $deldata = Category::where('id', $data)->first();
        if ($deldata) {
            Category::find($data)->update([
                'index_no' => null,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "oppes! Something went worng please try again"]);
        }
    }
    public function render()
    {
        return view('livewire.admin.settings.category-index-setting', [
            'datas' => Category::where('status', 0)->get(),
            'oldcountdata' => Category::whereNotNull('index_no')->orderBy('index_no','asc')->get()
        ]);
    }
}
