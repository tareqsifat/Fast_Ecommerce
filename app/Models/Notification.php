<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'body',
        'notification_for',
        'notification_for',
        'message_type',
        'status',
        'notification',
    ];
}
