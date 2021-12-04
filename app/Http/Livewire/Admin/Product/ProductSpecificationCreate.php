<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductSpecification;
use App\Models\ProductSpecificationOptions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductSpecificationCreate extends Component
{

    public $title, $name, $description, $user_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function close()
    {
        $this->name = '';
        $this->title = '';
        $this->description = '';
    }

    public function save()
    {
        $this->validate(
            [
                'title' => 'required',
                'name.0' => 'required',
                'description.0' => 'required',
                'name.*' => 'required',
                'description.*' => 'required',
            ],
            [
                'title.0' => 'Title field is required.',
                'name.0.required' => 'Name field is required',
                'description.0.required' => 'Description field is required',
                'name.*.required' => 'Name field is required',
                'description.*.required' => 'Description field is required',
            ]
        );
        $specification = ProductSpecification::create([
            'title' => $this->title,
            'user_id' => Auth::user()->id,
        ]);
        foreach ($this->name as $key => $value) {
            ProductSpecificationOptions::create(
                [
                    'name' => $this->name[$key],
                    'description' => $this->description[$key],
                    'product_specification_id' => $specification->id,
                ]
            );
        }
        $this->close();
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        return view('livewire.admin.product.product-specification-create');
    }
}
