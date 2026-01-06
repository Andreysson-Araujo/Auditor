<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $table = 'perguntas';
    protected $fillable =[
        'pilar_id',
        'texto_pergunta',
    ];

    public function pilar()
    {
        return $this->belongsTo(Pilar::class, 'pilar_id');
    }
}
