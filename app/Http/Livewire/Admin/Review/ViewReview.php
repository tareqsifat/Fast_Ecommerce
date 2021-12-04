<?php

namespace App\Http\Livewire\Admin\Review;

use App\Models\Productreview;
use Livewire\Component;

class ViewReview extends Component
{
    public $data;
    protected $listeners = ['getModalId'];
    function getModalId($item)
    {
        $this->data = Productreview::find($item);
    }


    public function close()
    {
        $this->data = null;
    }



    public function render()
    {
        return view('livewire.admin.review.view-review');
    }
}
