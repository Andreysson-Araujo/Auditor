@extends('layouts.header')

@section('title', 'Editar Usuário')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark"> <h4 class="mb-0">Editar Usuário: {{ $usuario->name }}</h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT') 

                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">Nome Completo:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="font-weight-bold">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
                        </div>

                        <div class="alert alert-info py-2 shadow-sm">
                            <small><i class="fas fa-info-circle"></i> Deixe os campos de senha em branco caso não deseje alterá-la.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="font-weight-bold">Nova Senha (opcional):</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold">Confirmar Nova Senha:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary px-4">Atualizar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection