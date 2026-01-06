@extends('layouts.header') {{-- Ajuste para o nome do seu layout --}}

@section('title', 'Nova Pergunta')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Cadastrar Nova Pergunta</h4>
                    </div>
                    <div class="card-body">

                        {{-- Exibição de Erros de Validação --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('perguntas.store') }}" method="POST">
                            @csrf

                            {{-- Campo: ID do Pilar --}}
                            <div class="form-group mb-3">
                            <label for="pilar_id" class="form-label font-weight-bold">Selecione o Pilar:</label>
                            <select name="pilar_id" id="pilar_id"
                                class="form-control @error('pilar_id') is-invalid @enderror" required>
                                <option value="">-- Selecione um Pilar --</option>

                                @foreach ($pilares as $pilar)
                                    <option value="{{ $pilar->id }}"
                                        {{ old('pilar_id') == $pilar->id ? 'selected' : '' }}>
                                        {{ $pilar->id }} </option>
                                @endforeach
                            </select>

                            @error('pilar_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>

                    {{-- Campo: Texto da Pergunta --}}
                    <div class="form-group mb-4">
                        <label for="texto_pergunta" class="form-label font-weight-bold">Texto da Pergunta:</label>
                        <textarea name="texto_pergunta" id="texto_pergunta" rows="4"
                            class="form-control @error('texto_pergunta') is-invalid @enderror"
                            placeholder="Digite aqui o enunciado da pergunta..." required>{{ old('texto_pergunta') }}</textarea>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('perguntas.index') }}" class="btn btn-secondary">
                            Voltar para Lista
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            Salvar Pergunta
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
