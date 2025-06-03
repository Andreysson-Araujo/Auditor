@extends('layouts.header')
@section('title', 'Relatório de Manifestações')

@section('content')
<div class="manifestacao-container">
    <h1>Relatório de Manifestações</h1>

    <div class="mb-4">
        <p><strong>Total de manifestações:</strong> {{ $total }}</p>
        <p><strong>Manifestações no mês:</strong> {{ $mesAtual }}</p>
        <p><strong>Manifestações na semana:</strong> {{ $semanaAtual }}</p>
    </div>

</div>
@endsection
