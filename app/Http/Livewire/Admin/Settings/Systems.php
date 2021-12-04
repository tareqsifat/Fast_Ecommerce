<?php

namespace App\Http\Livewire\Admin\Settings;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Systems extends Component
{
    public function clear_cache()
    {
        // Artisan::call('optimize:clear');
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Clear Cache Successfully']);
    }

    public function render()
    {
        return view('livewire.admin.settings.systems');
    }
}
