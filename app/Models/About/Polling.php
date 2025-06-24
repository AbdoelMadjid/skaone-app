<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start_time', 'end_time'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
