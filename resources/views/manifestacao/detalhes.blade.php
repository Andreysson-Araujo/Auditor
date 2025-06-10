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
        <tr>
            <th>Servidor</th>
            <td>{{ $formulario->servidor->nome ?? 'Não informado' }}</td>
        </tr>
        <tr>
            <th>Órgão</th>
            <td>{{ $formulario->servidor->orgao->nome ?? 'Não informado' }}</td>
        </tr>
        <tr>
            <th>Classificação</th>
            <td>{{ $formulario->classificate }}</td>
        </tr>
        <tr>
            <th>Data de Envio</th>
            <td>{{ $formulario->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <th>Comentário</th>
            <td>{{ $formulario->comments ?? 'Sem comentário' }}</td>
        </tr>
        <tr>
            <th>Quanto às capacitações fornecidas pela OCA e sua aplicação na rotina de trabalho. Como você se sente?</th>
            <td>{{ $respostasTexto[$formulario->answer_1] }}</td>
        </tr>
        <tr>
            <th>Como você avalia o papel do seu líder?</th>
            <td>{{ $respostasTexto [$formulario->answer_2] }}</td>
        </tr>
        <tr>
            <th>Como você avalia a qualidade da comunicação com sua equipe e liderança no dia de trabalho?</th>
            <td>{{$respostasTexto [$formulario->answer_3] }}</td>
        </tr>
        <tr>
            <th>Como você avalia o ambiente de trabalho da OCA, considerando a infraestrutura, o acolhimento institucional, os valores da organização e as relações interpessoais?</th>
            <td>{{$respostasTexto [$formulario->answer_4] }}</td>
        </tr>
        <tr>
            <th>Em relação às ações promovidas para o bem-estar e qualidade de vida no trabalho. Como você se sente?</th>
            <td>{{$respostasTexto [$formulario->answer_5] }}</td>
        </tr>
        <tr>
            <th>Você faltou alguma das últimas 3 capacitações?</th>
            <td>{{ $formulario->answer_6 }}</td>
        </tr>
    </table>

    <br>
    <a href="{{ route('manifestacoes') }}" class="btn-ver">Voltar</a>
    <a href="{{ route('manifestacoes.auditar') }}" class="btn-aud">Auditar</a>
</div>
@endsection
