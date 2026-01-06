<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pilar extends Model
{
    use HasFactory;

    protected $table = 'pilares';

    protected $fillable = [
        'pilar_1',
        'pilar_2',
        'pilar_3',
        'pilar_4',    
        'pilar_5',
        'pilar_6',
       
    ];

    
}
