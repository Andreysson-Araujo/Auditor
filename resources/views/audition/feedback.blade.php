@extends('layouts.header')
@section('title', 'Detalhes da Manifestação')

@section('content')
    <div class="feedback-container">
        <h1 class="feedback-title">Feedback da Manifestação</h1>

        <div class="formulario-info">
            <p><strong>Manifestação de N°:</strong> {{ $formulario->id ? str_pad($formulario->id, 6, '0', STR_PAD_LEFT) : 'Não Informado' }}</p>
            <p><strong>Formulario respondido por:</strong> {{ $formulario->servidor->nome ?? 'Sem título' }}</p>
            <p><strong>Respondido em:</strong> {{ $formulario->created_at->format('d/m/Y') ?? 'Sem descrição' }}</p>
        </div>

        <form action="{{ route('feedback.store') }}" method="POST" class="feedback-form">
            @csrf
            <input type="hidden" name="formulario_id" value="{{ $formulario->id }}">
            
            <div class="form-group">
                <label for="mensagem" class="msg-container"> <strong>Mensagem:</strong></label>
                <textarea name="mensagem" id="mensagem" required class="textarea-feedback"></textarea>
            </div>
            
            <button type="submit" class="btn-feedback">Enviar Feedback</button>
        </form>
    </div>
@endsection
