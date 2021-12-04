<?php

namespace App\Http\Livewire\Front\Pages;

use App\Models\AskQuestion as ModelsAskQuestion;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AskQuestion extends Component
{
    public $data;
    public $description;
    public $title;
    public $product_id;
    public $shop_id;
    public $shop_as;
    public $email;
    public $slug;
    function mount($slug)
    {
        $this->slug = $slug;
        $data = Product::where('slug', $slug)->first();
        if ($data) {
            $this->title = $data->title;
            $this->product_id = $data->id;
            $this->shop_id = $data->user_id;
            $this->shop_as = $data->shop_for;
            $this->email = Auth::user()->email;
        } else {
            return abort(404);
        }
    }
    
    public function save()
    {
        $this->validate([
            'title' => 'required',
            'product_id' => 'required',
            'email' => 'required',
            'description' => 'required|min:20|max:300',
        ]);
        ModelsAskQuestion::create([
            'product_id' => $this->product_id,
            'product_title' => $this->title,
            'shop_id' => $this->shop_id,
            'shop_as' => $this->shop_as,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'email' => $this->email,
        ]);
        return redirect(route('single', $this->slug));
        $this->dispatchBrowserEvent('successalert', ['success' => 'Your Question is under approve? Your will get ans within 24 hours']);
    }
    public function render()
    {
        return view('livewire.front.pages.ask-question')->layout('layouts.web');
    }
}
