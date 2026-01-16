@extends('layouts.header')

@section('title', 'Registro de Manifestações')

@section('content')
    <div class="manifestacao-container">
        <h1>Registro de Manifestações</h1>

        {{-- Filtro de Data --}}
        <form action="{{ route('manifestacoes') }}" method="GET" class="form-filtro-data mb-4">
            <label for="data" class="label-filtro">Filtrar por data:</label>
            <input type="date" name="data" id="data" value="{{ request('data') }}">
            <button class="btn btn-secondary" type="submit">Filtrar</button>
            <a href="{{ route('manifestacoes') }}" class="btn btn-outline-secondary">Limpar</a>
        </form>

        <table class="manifestacao-table table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Data / Hora</th>
                    <th>Órgão</th>
                    <th>Central</th>
                    <th>Servidor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($formularios as $item)
                    <tr>
                        {{-- Data e Hora do Envio --}}
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}</td>

                        {{-- Órgão (Relacionamento: Resposta -> Servidor -> Orgao) --}}
                        <td>{{ $item->servidor->orgao->nome ?? 'N/A' }}</td>

                        {{-- Central (Relacionamento: Resposta -> Servidor -> Central) --}}
                        <td>{{ $item->servidor->central->nome ?? 'N/A' }}</td>

                        {{-- Nome do Servidor --}}
                        <td>{{ $item->servidor->nome ?? 'Servidor não encontrado' }}</td>

                        <td>
                            {{-- Link para Detalhes --}}
                            <a href="{{ route('manifestacao.ver', ['servidor' => $item->servidor_id, 'data' => $item->created_at]) }}"
                                class="btn-ver">
                                Ver Respostas
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhuma resposta encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $formularios->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
