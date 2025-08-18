@extends('layouts.header')
@section('title', 'Feedback')

@section('content')

<h1>Todos os Feedbacks</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<ul>
    @foreach($feedbacks as $feedback)
        <li>
            <strong>Usuário:</strong> {{ $feedback->user->name ?? 'Anônimo' }}<br>
            <strong>Formulário:</strong> {{ $feedback->formulario->titulo ?? 'N/A' }}<br>
            <strong>Mensagem:</strong> {{ $feedback->mensagem }}<br>
            <hr>
        </li>
    @endforeach
</ul>