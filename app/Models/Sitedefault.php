<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitedefault extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'copyright',
        'sitedescription',
        'menuebackground',
        'bodybackground',
        'onsellTime',
        'merchant_onsellTime',
        'email',
        'phone',
        'address',
        'playstore',
        'appstore'
    ];
}
