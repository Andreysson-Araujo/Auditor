<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function servidores()
    {
        return $this->hasMany(Servidor::class, 'orgao_id');
    }
}
