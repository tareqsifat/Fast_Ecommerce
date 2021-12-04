<?php

namespace App\Http\Livewire\Admin\Review;

use App\Models\Productreview;
use Livewire\Component;

class Reviews extends Component
{

    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = Productreview::find($id);
        if ($delData) {
            Productreview::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return abort(404);
        };
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Productreview::find($data);
        if ($action == 'view') {
            $this->emit('getModalId', $data);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->save();
        } elseif ($action == 'enable') {
            $newData->status = 0;
            $newData->save();
        } elseif ($action == 'desableNotification') { /* action where click status button */
            $newData->Notification = 0;
            $newData->save();
            $this->emit('refreshParent');
        } elseif ($action == 'enableNotification') {
            $newData->Notification = 1;
            $newData->save();
            $this->emit('refreshParent');
        }
    }
    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }
    // render method 
    public function render()
    {
        return view('livewire.admin.review.reviews', [
            'datas' => Productreview::where('product_name', 'LIKE', "%{$this->searchItem}%")
                ->orwhere('comment', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  Productreview::all()
        ]);
    }
}
