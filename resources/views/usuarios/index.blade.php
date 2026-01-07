@extends('layouts.header')

@section('title', 'Gestão de Usuários')

@section('content')

<div class="generic-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-0">Gestão de Usuarios</h2>
                <small class="text-muted">Lista de usuarios</small>
            </div>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary shadow-sm">
                Novo usuario
            </a>
        </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Cadastro</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>#{{ $usuario->id }}</td>
                            <td><strong>{{ $usuario->name }}</strong></td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('usuarios.update', $usuario->id) }}" class="btn btn-sm btn-outline-warning">
                                        Editar
                                    </a>
                                    
                                    {{-- Evitar que o usuário logado se delete --}}
                                    @if(auth()->id() !== $usuario->id)
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir este usuário?')">
                                                Excluir
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Nenhum usuário cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection