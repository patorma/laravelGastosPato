<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //permitir cambios como asignacion masiva
    protected $fillable = [
        'excerpt',
        'content'
    ];
}
