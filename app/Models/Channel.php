<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'creator_id', 'messagecount'];

    // Relasi ke user (pembuat channel)
    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    // Relasi ke user (anggota channel)
    public function users()
    {
        return $this->belongsToMany(User::class, 'channel_user');
    }
}
