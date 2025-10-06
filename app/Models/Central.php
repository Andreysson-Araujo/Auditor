<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Central extends Model
{
    use HasFactory;

    protected $table = "central";

    protected $fillable = [
        "nome",
        'data_de_inauguracao',
    ];
   
}
