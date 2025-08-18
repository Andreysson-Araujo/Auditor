@extends('layouts.header')
@section('title', 'Detalhes da Manifestação')

@section('content')
    <h1>Feedback da Manifestação</h1>

    <p>Manifestação ID: {{ $formulario->id }}</p>
    <p>Título: {{ $formulario->titulo ?? 'Sem título' }}</p>
    <p>Descrição: {{ $formulario->descricao ?? 'Sem descrição' }}</p>

    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <input type="hidden" name="formulario_id" value="{{ $formulario->id }}">
        <div>
            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" id="mensagem" required></textarea>
        </div>
        <button type="submit">Enviar Feedback</button>
    </form>
@endsection
