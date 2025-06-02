@extends('layouts.header')
@section('title', 'Registro de Manifestações')

@section('content')

<div class="manifestacao-container">
    <h1>Registro de Manifestações</h1>
    @if(count($formularios) > 0)
    <table class="manifestacao-table">
        <thead>
            <tr>
                <th>Orgão</th>
                <th>Classificação</th>
                <th>Data</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($formularios as $formulario)
                <tr>
                   <td>{{$formulario->servidores->orgao_id ?? 'Não Informado'}}</td>
                   <td>{{ $formulario->classificate }}</td>
                   <td>{{ $formulario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhuma manifestação encontrada.</p>
@endif
</div>

@endsection
    
