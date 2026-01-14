<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $table = 'respostas';

    // Campos que o Laravel tem permissão para gravar
    protected $fillable = [
        'servidor_id', 
        'pergunta_id', 
        'valor', 
        'classificacao_geral', 
        'comentarios',
        'auditado' // Adicione este se quiser usar a função de auditar
    ];

    // Relacionamento com o Servidor
    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidor_id');
    }

    // Relacionamento com a Pergunta
    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class, 'pergunta_id');
    }
}