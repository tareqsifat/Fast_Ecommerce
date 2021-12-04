<?php

namespace App\Http\Livewire\Admin\Product\ProductStyle;

use App\Models\ProductStyle as ModelsProductStyle;
use Livewire\Component;

class ProductStyle extends Component
{
    public $card_text;
    public $card_button_text_color;
    public $card_button_background;
    public $card_button_border;
    public $card_button_transition;
    public $card_button_font_style;
    public $card_button_font_weight;
    public $card_button_text_hover_color;
    public $card_button_hover_background;
    public $card_button_hover_border;
    public $card_button_hover_font_style;
    public $card_button_hover_font_weight;
    public $wishlist_button_text_color;
    public $wishlist_button_background;
    public $wishlist_button_border;
    public $wishlist_button_transition;
    public $wishlist_button_hover_text_color;
    public $wishlist_button_hover_background;
    public $wishlist_button_hover_border;
    function mount()
    {
        $data = ModelsProductStyle::first();
        $this->card_text = $data->card_text;
        $this->card_button_text_color = $data->card_button_text_color;
        $this->card_button_background = $data->card_button_background;
        $this->card_button_border = $data->card_button_border;
        $this->card_button_transition = $data->card_button_transition;
        $this->card_button_font_style = $data->card_button_font_style;
        $this->card_button_font_weight = $data->card_button_font_weight;
        $this->card_button_text_hover_color = $data->card_button_text_hover_color;
        $this->card_button_hover_background = $data->card_button_hover_background;
        $this->card_button_hover_border = $data->card_button_hover_border;
        $this->card_button_hover_font_style = $data->card_button_hover_font_style;
        $this->card_button_hover_font_weight = $data->card_button_hover_font_weight;
        
        $this->wishlist_button_text_color = $data->wishlist_button_text_color;
        $this->wishlist_button_background = $data->wishlist_button_background;
        $this->wishlist_button_border = $data->wishlist_button_border;
        $this->wishlist_button_transition = $data->wishlist_button_transition;
        $this->wishlist_button_hover_text_color = $data->wishlist_button_hover_text_color;
        $this->wishlist_button_hover_background = $data->wishlist_button_hover_background;
        $this->wishlist_button_hover_border = $data->wishlist_button_hover_border;
    }

    public function save()
    {
        $data = ModelsProductStyle::first();
        $data->card_text = $this->card_text;
        $data->card_button_text_color = $this->card_button_text_color;
        $data->card_button_background = $this->card_button_background;
        $data->card_button_border = $this->card_button_border;
        $data->card_button_transition = $this->card_button_transition;
        $data->card_button_font_style = $this->card_button_font_style;
        $data->card_button_font_weight = $this->card_button_font_weight;
        $data->card_button_text_hover_color = $this->card_button_text_hover_color;
        $data->card_button_hover_background = $this->card_button_hover_background;
        $data->card_button_hover_border = $this->card_button_hover_border;
        $data->card_button_hover_font_style = $this->card_button_hover_font_style;
        $data->card_button_hover_font_weight = $this->card_button_hover_font_weight;
        $data->wishlist_button_text_color = $this->wishlist_button_text_color;
        $data->wishlist_button_background = $this->wishlist_button_background;
        $data->wishlist_button_border = $this->wishlist_button_border;
        $data->wishlist_button_transition = $this->wishlist_button_transition;
        $data->wishlist_button_hover_text_color = $this->wishlist_button_hover_text_color;
        $data->wishlist_button_hover_background = $this->wishlist_button_hover_background;
        $data->wishlist_button_hover_border = $this->wishlist_button_hover_border;
        $data->save();
        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
    }
    public function render()
    {
        return view('livewire.admin.product.product-style.product-style');
    }
}
