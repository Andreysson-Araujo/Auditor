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

    <form action="{{route('manifestacoes')}}" method="GET" class="form-filtro-data">
        <label for="data" class="label-filtro">Filtrar por data:</label>
        <input type="date" name="data" id="data" value="{{request('data')}}">
        <button class="btn btn-secondary" type="submit">Filtrar</button>
    </form>

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
                    <td>
                        @if($formulario->auditado)
                            <span title="Auditado" style="color: green; margin-left: 5px;">✅</span>
                        @endif
                       <span>{{ $formulario->id ? 'nº ' . str_pad($formulario->id, 6, '0', STR_PAD_LEFT) : 'Não Informado' }}</span> 
                    </td>
                    
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
    
