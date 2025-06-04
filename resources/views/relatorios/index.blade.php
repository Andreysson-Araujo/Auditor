@extends('layouts.header')
@section('title', 'Relatório de Manifestações')

@section('content')
<div class="manifestacao-container">
    <h1>Relatório de Manifestações</h1>

    <div class="mb-4">
        <p><strong>Total geral:</strong> {{ $totalGeral }}</p>
        <p><strong>Total do mês:</strong> {{ $totalMes }}</p>
        <p><strong>Total da semana:</strong> {{ $totalSemana }}</p>
    </div>

    <form method="GET" action="" class="mb-4">
        <label>Data Início:</label>
        <input type="date" name="data_inicio" required>

        <label>Data Fim:</label>
        <input type="date" name="data_fim" required>

        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    @if($formulariosFiltrados->isNotEmpty())
    <h3>Manifestações no período selecionado:</h3>
    <p><strong>Total no período:</strong> {{ $formulariosFiltrados->count() }}</p>
    <table class="manifestacao-table">
        <thead>
            <tr>
                <th>Orgão</th>
                <th>Classificação</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formulariosFiltrados as $formulario)
                <tr>
                    <td>{{ $formulario->servidor->orgao->nome ?? 'Não informado' }}</td>
                    <td>{{ $formulario->classificate }}</td>
                    <td>{{ $formulario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(request()->filled('data_inicio'))
        <p>Nenhuma manifestação encontrada no período selecionado.</p>
    @endif
</div>
@endsection
