<?php

namespace App\Http\Livewire\Front\Auth\Customers;

use App\Models\Productreview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reviews extends Component
{
    public function render()
    {
        $reviews = Productreview::where('user_id', Auth::user()->id)->get();
        return view('livewire.front.auth.customers.reviews', compact(['reviews']))->layout('layouts.web');
    }
}
