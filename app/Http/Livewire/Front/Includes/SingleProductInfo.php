<?php

namespace App\Http\Livewire\Front\Includes;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SingleProductInfo extends Component
{
    public $divisions_id;
    public $district_id;
    public $upazilla;
    public $divisions_name;
    public $district_name;
    public $is_open = false;
    public $stape = 1;

    public function toggleIsOpen()
    {
        if ($this->is_open == true) {
            $this->is_open = false;
            $this->divisions_id = null;
            $this->divisions_name = null;
            $this->district_name = null;
            $this->upazilla = null;
            $this->stape = 1;
        } else {
            $this->is_open = true;
        }
    }


    public function stap1()
    {
        $this->validate([
            'divisions_id' => 'required',
        ], [
            'divisions_id.required' => 'Please Select Division'
        ]);
        $divisions = DB::table('divisions')->where('id', $this->divisions_id)->first();
        $this->divisions_name = $divisions->name;
        $this->stape = 2;
    }

    public function stap2()
    {
        $this->validate([
            'district_id' => 'required',
        ], [
            'district_id.required' => 'Please Select District'
        ]);
        $districts = DB::table('districts')->where('id', $this->district_id)->first();
        $this->divisions_name = $districts->name;
        $this->stape = 3;
    }
    public function stap3()
    {
        $this->validate([
            'upazilla' => 'required',
        ], [
            'upazilla.required' => 'Please Select Upazilla'
        ]);
        session(['delevary_location' => "$this->divisions_name $this->divisions_name $this->upazilla"]);
        $this->stape = 1;
        $this->divisions_id = null;
        $this->divisions_name = null;
        $this->district_name = null;
        $this->upazilla = null;
        $this->is_open = false;
        $this->dispatchBrowserEvent('successalert', ['success' => 'Your Delevary Location Change Successfully']);
    }

    public function render()
    {
        $divisionData = DB::table('divisions')->get();
        $districts = DB::table('districts')->where('division_id', $this->divisions_id)->get();
        $upazilas = DB::table('upazilas')->where('district_id', $this->district_id)->get();
        return view('livewire.front.includes.single-product-info', compact(
            [
                'divisionData',
                'districts',
                'upazilas',
            ]
        ));
    }
}
