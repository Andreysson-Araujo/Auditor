@extends('layouts.header')
@section('title', 'Registro de Manifestações')

@section('content')


<div class="manifestacao-container">
    <h1>Registro de Manifestações</h1>
    @if(count($formularios) > 0)
    <table class="manifestacao-table">
        <thead>
            <tr>
                <th>Resgistro</th>
                <th>Classificação</th>
                <th>Data</th>
                <th>Auditar</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($formularios as $formulario)
                <tr>
                   <td>{{ $formulario->id ? 'nº ' . str_pad($formulario->id, 6, '0', STR_PAD_LEFT) : 'Não Informado' }}</td>
                   <td>{{ $formulario->classificate }}</td>
                   <td>{{ $formulario->created_at->format('d/m/Y H:i') }}</td>
                   <td>
                    <a href="{{ route('manifestacao.ver', $formulario->id) }}" class="btn-ver">Ver</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhuma manifestação encontrada.</p>
@endif
</div>

@endsection
    
