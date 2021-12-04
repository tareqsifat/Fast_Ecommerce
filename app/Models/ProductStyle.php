<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStyle extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_text',
        'card_button_text_color',
        'card_button_background',
        'card_button_border',
        'card_button_transition',
        'card_button_font_style',
        'card_button_font_weight',
        'card_button_text_hover_color',
        'card_button_hover_background',
        'card_button_hover_border',
        'card_button_hover_font_style',
        'card_button_hover_font_weight',
        'wishlist_button_text_color',
        'wishlist_button_background',
        'wishlist_button_border',
        'wishlist_button_transition',
        'wishlist_button_hover_text_color',
        'wishlist_button_hover_background',
        'wishlist_button_hover_border',
    ];
}
