@extends('layouts.header')
@section('title', 'Relatório de Manifestações')

@section('content')
<div class="manifestacao-container">
    <h1>Relatório de Manifestações</h1>

    <div class="mb-4">
        <p><strong>Total geral:</strong> {{ $totalGeral }}</p>
        <p><strong>Total do mês:</strong> {{ $totalMes }}</p>
        <p><strong>Total da semana:</strong> {{ $totalSemana }}</p>
    </div>

    <form method="GET" action="" class="mb-4">
        <label>Data Início:</label>
        <input type="date" name="data_inicio" id="data_inicio" required>
        <span id="data_inicio_formatada" style="margin-left: 10px; font-style: italic; color: #555;"></span>
    
        <br>
    
        <label>Data Fim:</label>
        <input type="date" name="data_fim" id="data_fim" required>
        <span id="data_fim_formatada" style="margin-left: 10px; font-style: italic; color: #555;"></span>
    
        <br><br>
    
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>
    
    <script>
      function formatarData(data) {
        if (!data) return "";
        const [ano, mes, dia] = data.split("-");
        return `${dia}/${mes}/${ano}`;
      }
    
      document.getElementById("data_inicio").addEventListener("change", function () {
        document.getElementById("data_inicio_formatada").textContent = formatarData(this.value);
      });
    
      document.getElementById("data_fim").addEventListener("change", function () {
        document.getElementById("data_fim_formatada").textContent = formatarData(this.value);
      });
    </script>
    

    @if($formulariosFiltrados->isNotEmpty())
    <h3>Manifestações no período selecionado:</h3>
    <p><strong>Total no período:</strong> {{ $formulariosFiltrados->count() }}</p>
    <table class="manifestacao-table">
        <thead>
            <tr>
                <th>Orgão</th>
                <th>Central</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formulariosFiltrados as $formulario)
                <tr>
                    <td>{{ $formulario->servidor->orgao->nome ?? 'Não informado' }}</td>
                    <td>{{ $formulario->servidor->central->nome ?? "Sem Central" }}</td>
                    <td>{{ $formulario->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(request()->filled('data_inicio'))
        <p>Nenhuma manifestação encontrada no período selecionado.</p>
    @endif
</div>
@endsection
