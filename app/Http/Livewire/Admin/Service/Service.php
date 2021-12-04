<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServeceImage;
use App\Models\Service as ModelsService;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Service extends Component
{
    public $item;
    public $searchItem;
    protected $listeners = ['refreshParent' => '$refresh'];
    // delete into database 
    public function delete($id)
    {
        $destroydata = ModelsService::where('id', $id)->first();
        if ($destroydata) {
            $delProductImage = ServeceImage::where('service_id', $id)->get();
            if ($delProductImage->count() > 0) {
                foreach ($delProductImage as $delImgItem) {
                    if (file_exists("uploads/services/$delImgItem->image")) {
                        File::delete("uploads/services/$delImgItem->image");
                    };
                    ServeceImage::destroy($delImgItem->id);
                }
            }
        }
        ModelsService::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = ModelsService::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newdata->status = 1;
            $newdata->save();
        } elseif ($action == 'enable') {
            $newdata->status = 0;
            $newdata->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.service.service', [
            'datas' => ModelsService::where('title', 'LIKE', "%{$this->searchItem}%")
                ->where('icon', 'LIKE', "%{$this->searchItem}%")
                ->where('description', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->get(),
            'allcat' =>  ModelsService::all()
        ]);
    }
}
