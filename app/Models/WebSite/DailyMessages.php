<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMessages extends Model
{
    use HasFactory;
    protected $table = 'daily_messages';
    protected $fillable = ['date', 'message'];
}
