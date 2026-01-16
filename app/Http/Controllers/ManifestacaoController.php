<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resposta;

class ManifestacaoController extends Controller
{
    public function show()
    {
        // Vamos dar um "dump" para ver se o banco retorna algo
        $teste = \App\Models\Resposta::all();

        if ($teste->isEmpty()) {
            return "O banco retornou ZERO registros. Verifique o nome da tabela no Model Resposta.";
        }

        // Se houver dados, o código abaixo vai listar tudo sem filtros
        $formularios = \App\Models\Resposta::with(['servidor.orgao', 'servidor.central'])
            ->select('servidor_id', 'created_at', 'classificacao_geral')
            ->groupBy('servidor_id', 'created_at', 'classificacao_geral')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('manifestacao.showManifestacao', compact('formularios'));
    }

    public function ver($servidor_id, $data)
    {
        // Busca os detalhes das respostas para a tela de detalhes
        $respostas = Resposta::with('pergunta')
            ->where('servidor_id', $servidor_id)
            ->where('created_at', $data)
            ->get();

        return view('manifestacao.detalhes', compact('respostas'));
    }
}
