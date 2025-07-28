@extends('layouts.app')

@section('title', 'Auditar')

@section('content')
<div class="container">
    <h1 class="mb-4">Auditoria de Feedbacks</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Formulário</th>
                <th>Mensagem</th>
                <th>Auditado</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->user->name }}</td>
                    <td>#{{ $feedback->formulario_id }}</td>
                    <td>{{ $feedback->mensagem }}</td>
                    <td>
                        @if($feedback->formulario->auditado)
                            ✅
                        @else
                            ❌
                        @endif
                    </td>
                    <td>
                        @if(!$feedback->formulario->auditado)
                        <form method="POST" action="{{ route('formularios.audit', $feedback->formulario_id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Marcar como auditado</button>
                        </form>
                        @else
                            <span class="text-muted">Já auditado</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
