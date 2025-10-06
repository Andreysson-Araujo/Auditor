<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    use HasFactory;

    protected $table = 'servidores';

    protected $fillable = [
        'nome',
        'orgao_id',
        'central_id'
    ];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'orgao_id');
    }

    public function formularios()
    {
        return $this->hasMany(Formulario::class, 'servidores_id');
    }

    public function central()
    {
        return $this->belongsTo(Central::class, 'central_id');
    }
}
