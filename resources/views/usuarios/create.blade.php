@extends('layouts.header')

@section('title', 'Novo Usuário')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Cadastrar Novo Usuário</h4>
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

                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">Nome Completo:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="font-weight-bold">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="font-weight-bold">Senha:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold">Confirmar Senha:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-success px-4">Salvar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection