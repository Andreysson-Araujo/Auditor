@extends('layouts.header')
@section('title', 'Detalhes da Manifestação')

@section('content')
<div class="manifestacao-container">
    <h1>Detalhes da Manifestação</h1>

    @php
        $respostasTexto = [
            1 => 'Insatisfeito',
            2 => 'Pouco satisfeito',
            3 => 'Satisfeito',
            4 => 'Muito Satisfeito',
        ];
    @endphp

    <table class="manifestacao-table">
        {{-- Dados do Servidor vindos da variável $cabecalho --}}
        <tr>
            <th>Servidor</th>
            <td>{{ $cabecalho->servidor->nome ?? 'Não informado' }}</td>
        </tr>
        <tr>
            <th>Órgão</th>
            <td>{{ $cabecalho->servidor->orgao->nome ?? 'Não informado' }}</td>
        </tr>
        <tr>
            <th>Central</th>
            <td>{{ $cabecalho->servidor->central->nome ?? 'Não informado' }}</td>
        </tr>
        <tr>
            <th>Data de Envio</th>
            <td>{{ \Carbon\Carbon::parse($cabecalho->created_at)->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <th>Classificação Geral</th>
            <td>{{ $cabecalho->classificacao_geral ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Comentários/Sugestões</th>
            <td>{{ $cabecalho->comentarios ?? 'Sem comentários' }}</td>
        </tr>
    </table>

    <h2 class="mt-4">Respostas do Questionário</h2>
    <table class="manifestacao-table">
        <thead>
            <tr>
                <th>Pergunta</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($respostas as $resp)
                <tr>
                    <td style="width: 70%"><strong>{{ $resp->pergunta->titulo ?? 'Pergunta removida' }}</strong></td>
                    <td>
                        @if(is_numeric($resp->valor) && isset($respostasTexto[$resp->valor]))
                            {{ $respostasTexto[$resp->valor] }}
                        @else
                            {{ $resp->valor }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <div class="actions">
        <a href="{{ route('manifestacoes') }}" class="btn-ver">Voltar</a>
        
        {{-- Botão de Auditoria ajustado para a nova lógica --}}
        <form action="{{ route('manifestacoes.auditar', ['id' => $cabecalho->servidor_id, 'data' => $cabecalho->created_at]) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-aud" onclick="return confirm('Confirmar auditoria?')">Auditar</button>
        </form>
    </div>
</div>
@endsection