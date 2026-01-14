<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    // Define o nome correto da tabela no banco de dados
    protected $table = 'feedback'; 

    // Campos permitidos para preenchimento em massa
    protected $fillable = [
        'servidores_id', 
        'pilar_id', 
        'user_id', 
        'confirm', 
        'mensagem'
    ];

    // Relacionamento com o Servidor
    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidores_id');
    }
}