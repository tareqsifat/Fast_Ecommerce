<?php

namespace App\Http\Livewire\Admin\Users\Merchent;

use App\Models\Merchant;
use Livewire\Component;

class MerchantUserView extends Component
{
    public $data;
    protected $listeners = [
        'getModalId',
    ];
    public function getModalId($item)
    {
        $this->data = Merchant::where('id', $item)->first();
    }
    public function close()
    {
        $this->data = NULL;
    }
    public function render()
    {
        return view('livewire.admin.users.merchent.merchant-user-view');
    }
}
