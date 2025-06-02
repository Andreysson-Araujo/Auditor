<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servidor;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'servidores_id',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'answer_5',
        'answer_6',
        'classificate',
        'comments',
    ];

    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidores_id');
    }
}


