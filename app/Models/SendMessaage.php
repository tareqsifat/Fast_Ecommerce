<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMessaage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'phone',
        'email',
        'message_for',
        'message',
        'notification',
    ];
}
