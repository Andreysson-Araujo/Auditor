<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resposta;
use Illuminate\Support\Facades\DB;
use App\Models\Formulario;

class ManifestacaoController extends Controller
{
    // No ManifestacaoController.php
public function show()
{
    $data = request('data');

    // Carrega tudo em uma única consulta ao banco
    $query = Formulario::with(['servidor.orgao', 'servidor.central'])
                        ->orderBy('created_at', 'desc');

    if ($data) {
        $query->whereDate('created_at', $data);
    }

    $formularios = $query->paginate(10);

    return view('manifestacao.showManifestacao', compact('formularios', 'data'));
}

    public function ver($id)
    {
        // 1. Busca o feedback (cabeçalho/auditoria)
        $formulario = \App\Models\Formulario::with('servidor')->findOrFail($id);

        // 2. Busca as respostas ligadas a este servidor na mesma data
        $respostas = Resposta::with('pergunta')
            ->where('servidor_id', $formulario->servidores_id)
            ->whereDate('created_at', $formulario->created_at->format('Y-m-d'))
            ->get();

        return view('manifestacao.detalhes', compact('formulario', 'respostas'));
    }

    public function auditar($id)
    {
        // A auditoria acontece na tabela feedback
        $feedback = \App\Models\Formulario::findOrFail($id);
        
        // No seu diagrama a coluna de auditoria pode ter outro nome, 
        // ajuste para o nome correto (ex: 'confirm' ou 'auditado')
        $feedback->auditado = true; 
        $feedback->save();

        return redirect()->route('manifestacoes')->with('success', 'Auditado com sucesso!');
    }
}