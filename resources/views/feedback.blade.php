@extends('layouts.header')
@section('title', 'Feedback2')

@section('content')

<h1>Visualização Geral dos Feedbacks</h1>

@foreach($feedbacks as $feedback)
    <div>
        <p><strong>Usuário:</strong> {{ $feedback->user->name ?? 'Desconhecido' }}</p>
        <p><strong>Mensagem:</strong> {{ $feedback->mensagem }}</p>
        <p><strong>Formulário:</strong> {{ $feedback->formulario->titulo ?? 'N/A' }}</p>
        <hr>
    </div>
@endforeach