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
        // 1. Busca todas as respostas desse envio
        $respostas = Resposta::with(['pergunta', 'servidor.orgao', 'servidor.central'])
            ->where('servidor_id', $servidor_id)
            ->where('created_at', $data)
            ->get();

        if ($respostas->isEmpty()) {
            return redirect()->route('manifestacoes')->with('error', 'Manifestação não encontrada.');
        }

        // 2. Pegamos o primeiro registro para exibir os dados do servidor (nome, órgão, etc)
        $cabecalho = $respostas->first();

        return view('manifestacao.detalhes', compact('respostas', 'cabecalho'));
    }
}
