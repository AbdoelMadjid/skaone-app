<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;
    protected $table = 'pollings';
    protected $fillable = ['title', 'start_time', 'end_time'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function responses()
    {
        return $this->hasManyThrough(Response::class, Question::class);
    }
}
