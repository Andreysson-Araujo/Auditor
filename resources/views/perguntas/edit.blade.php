@extends('layouts.header') {{-- Usando o seu layout padrão --}}

@section('title', 'Editar Pergunta')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Pergunta #{{ $pergunta->id }}</h4>
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

                    {{-- Rota de Update passando o ID da pergunta --}}
                    <form action="{{ route('perguntas.update', $pergunta->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- OBRIGATÓRIO para atualizações no Laravel --}}

                        {{-- Seleção do Pilar --}}
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

                        {{-- Texto da Pergunta --}}
                        <div class="form-group mb-4">
                            <label for="texto_pergunta" class="form-label font-weight-bold">Texto da Pergunta:</label>
                            <textarea name="texto_pergunta" id="texto_pergunta" rows="4"
                                class="form-control @error('texto_pergunta') is-invalid @enderror" 
                                required>{{ old('texto_pergunta', $pergunta->texto_pergunta) }}</textarea>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('perguntas.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Atualizar Pergunta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection