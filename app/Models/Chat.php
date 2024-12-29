<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'recipient_id', 'last_message', 'last_message_at', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar']);
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id')->select(['id', 'name', 'avatar']);
    }
}
