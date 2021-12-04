<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topbar extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'button',
        'url',
        'header_bg',
        'header_text_color',
        'header_icon_color',
        'header_hover_color',
    ];
}
