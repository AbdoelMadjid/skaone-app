<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = ['polling_id', 'question_text', 'question_type', 'choice_descriptions'];

    protected $casts = [
        'choice_descriptions' => 'array',
    ];

    public function polling()
    {
        return $this->belongsTo(Polling::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
