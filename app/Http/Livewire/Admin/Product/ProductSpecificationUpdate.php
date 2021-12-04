<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductSpecification;
use App\Models\ProductSpecificationOptions;
use Livewire\Component; 

class ProductSpecificationUpdate extends Component
{


    public $title, $name, $oname, $oid, $odescription, $description, $itemId;
    public $updateMode = false;
    public $inputs = [];
    public $i = 0;
    public $pSpData = [];

    protected $listeners = [
        'getModalId',
    ];

    public function getModalId($id)
    {
        $this->itemId = $id;
        $pSp = ProductSpecification::where('id', $id)->first();
        $this->title = $pSp->title;
        $this->pSpData  = ProductSpecificationOptions::where('product_specification_id', $id)->get();
        foreach ($this->pSpData as $key => $data) {
            $this->oname[$key] = $data->name;
            $this->odescription[$key] = $data->description;
            $this->oid[$key] = $data->id;
        }
    }



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
        $this->i = 0;
        $this->title = '';
        $this->description = '';
        $this->oname = '';
        $this->odescription = '';
        $this->oid = '';
        $this->inputs = [];
    }

    public function save()
    {
        $this->validate(
            [
                'title' => 'required',
                'oname.*' => 'required',
                'odescription.*' => 'required',
                'name.*' => 'required',
                'description.*' => 'required',
            ],
            [
                'name.*.required' => 'Name field is required',
                'description.*.required' => 'Description field is required',
                'oname.*.required' => 'Name field is required',
                'odescription.*.required' => 'Description field is required',
            ]
        );
        ProductSpecification::find($this->itemId)->update([
            'title' => $this->title,
        ]);
        if (!empty($this->oname)) {
            if (!is_null($this->oname)) {
                foreach ($this->oname as $key => $value) {
                    ProductSpecificationOptions::find($this->oid[$key])->update(
                        [
                            'name' => $this->oname[$key],
                            'description' => $this->odescription[$key],
                        ]
                    );
                }
            }
        }
        if (!empty($this->name)) {
            if (!is_null($this->name)) {
                foreach ($this->name as $key => $value) {
                    ProductSpecificationOptions::create(
                        [
                            'name' => $this->name[$key],
                            'description' => $this->description[$key],
                            'product_specification_id' => $this->itemId,
                        ]
                    );
                }
            }
        }
        $this->close();
        $this->getModalId($this->itemId);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }
    public function psPAction($id, $action)
    {
        if ($action == 'oldItemsdelete') {
            ProductSpecificationOptions::destroy($id);
            $this->emit('refreshParent');
            $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
            $this->getModalId($this->itemId);
            $this->id = '';
        }
    }

    public function render()
    {
        return view('livewire.admin.product.product-specification-update');
    }
}
