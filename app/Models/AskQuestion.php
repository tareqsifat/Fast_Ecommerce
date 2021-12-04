<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_title',
        'description',
        'user_id',
        'shop_id',
        'shop_as', //merchant or admin
        'email',
        'status',
        'notification',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ansQuestion()
    {
        return $this->hasMany(AnsQuestion::class, 'ask_question_id');
    }
}
