<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'first_name',
        'last_name',
        'email',
        'phone',
        'brithdate',
        'gander',
        'verification_code',
        'adress',
        'present_address',
        'description',
        'nid',
        'tid',
        'email_verified_at',
        'password',
        'provider_id',
        'avater',
        'user_role',
        'user_as',
        'delevery_system',
        'current_team_id',
        'profile_photo_path',
        'status',
        'verify_status',
        'notification',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
}
