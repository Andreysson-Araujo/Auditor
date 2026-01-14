@extends('layouts.header')

@section('title', 'Registro de Manifestações')

@section('content')
<div class="manifestacao-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Registro de Manifestações</h1>

    {{-- Filtro por data --}}
    <form action="{{ route('manifestacoes') }}" method="GET" class="form-filtro-data">
        <label for="data" class="label-filtro">Filtrar por data:</label>
        <input type="date" name="data" id="data" value="{{ request('data') }}">
        <button class="btn btn-secondary" type="submit">Filtrar</button>
    </form>

    <hr>

    @if(count($formularios) > 0)
    <table class="manifestacao-table table table-striped">
        <thead>
            <tr>
                <th>Registro</th>
                <th>Data</th>
                <th>Órgão</th>
                <th>Central</th>
                <th>Servidor</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formularios as $formulario)
                <tr>
                    <td>
                        {{-- Verifica o campo 'confirm' na tabela feedback --}}
                        @if($formulario->confirm)
                            <span title="Auditado" style="color: green; margin-right: 5px;">✅</span>
                        @endif
                        <span>{{ 'nº ' . str_pad($formulario->id, 6, '0', STR_PAD_LEFT) }}</span> 
                    </td>
                    
                    <td>{{ $formulario->created_at->format('d/m/Y H:i') }}</td>

                    {{-- Puxando dados através dos relacionamentos que você enviou --}}
                    <td>{{ $formulario->servidor->orgao->nome ?? 'N/A' }}</td>
                    <td>{{ $formulario->servidor->central->nome ?? 'N/A' }}</td>
                    <td>{{ $formulario->servidor->nome ?? 'Não identificado' }}</td>
                    
                    <td class="text-center">
                        {{-- Botão para ver os detalhes (Respostas) --}}
                        <a href="{{ route('manifestacao.ver', $formulario->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Ver Detalhes
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $formularios->appends(request()->query())->links() }}
    </div>
@else
    <div class="alert alert-light text-center">
        <p>Nenhuma manifestação encontrada para esta data.</p>
    </div>
@endif
</div>
@endsection