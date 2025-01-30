<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeDataPersonil extends Model
{
    use HasFactory;
    protected $table = 'welcome_data_personil'; // Specify the table name if it's not pluralized correctly
    protected $fillable = [
        'id_personil',
        'jenis_group',
        'group_name',
        'image',
    ];
}
