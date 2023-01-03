<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Word extends Model
{
    use HasFactory;



    protected $fillable = [
        'word',
        'w_spanish',

    ];
}
