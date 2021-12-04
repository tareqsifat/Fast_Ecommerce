<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'subtitle',
        'bg',
        'status',
    ];
    public function service_image()
    {
        return $this->hasMany(ServeceImage::class, 'service_id');
    }
}
