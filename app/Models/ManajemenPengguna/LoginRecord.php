<?php

namespace App\Models\ManajemenPengguna;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginRecord extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'login_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
