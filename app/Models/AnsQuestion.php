<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnsQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'ask_question_id',
        'user_id',
        'answer',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
