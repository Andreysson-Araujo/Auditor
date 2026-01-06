@extends('layouts.header')

@section('title', 'Listagem de Perguntas')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-0">Gestão de Perguntas</h2>
                <small class="text-muted">Lista de perguntas cadastradas por ID de Pilar</small>
            </div>
            <a href="{{ route('perguntas.create') }}" class="btn btn-primary shadow-sm">
                Nova Pergunta
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="container-fluid d-flex justify-content-center align-items-center mb-5">
            <a href="{{ route('perguntas.create') }}" class="btn btn-success px-4 py-2 shadow">
                <i class="fas fa-plus"></i> Criar nova pergunta
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width: 80px;">ID</th>
                            <th scope="col">Pilar</th>
                            <th scope="col">Texto da Pergunta</th>
                            <th scope="col" class="text-center" style="width: 180px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($perguntas as $pergunta)
                            <tr>
                                <td>#{{ $pergunta->id }}</td>
                                <td>
                                    <span class="badge badge-secondary px-3 py-2">
                                        Pilar: {{ $pergunta->pilar_id }}
                                    </span>
                                </td>
                                <td class="text-wrap">{{ $pergunta->texto_pergunta }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('perguntas.edit', $pergunta->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('perguntas.destroy', $pergunta->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Excluir pergunta?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    Nenhuma pergunta encontrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
