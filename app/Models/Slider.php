<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'description',
        'link_text',
        'url',
        'slider_for',
        'image',
        'status',
    ];
}
