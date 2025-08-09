<?php

namespace App\Models\Pkl\PembimbingPkl;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanPrakerin extends Model
{
    use HasFactory;
    protected $table = 'pesan_prakerins';
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'read_status',
    ];
}
