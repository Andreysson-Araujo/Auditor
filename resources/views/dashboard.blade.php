@extends('layouts.header')

@section('title', 'Dashboard')

@section('content')
    <h1 class="marginGraph" >Dashboard - Servidores por Nível</h1>

    <!-- Gráfico levemente maior e centralizado -->
    <div id="grafico-container" style="margin-bottom: 50px; width: 400px; margin: 0 auto;">
        <canvas id="grafico" width="400" height="400"></canvas>
    </div>

    <!-- Tabela com totais -->
    <div style="max-width: 900px; margin: 0 auto;">
        <h2 style="text-align: center; margin-top: 20px">Resumo por Nível</h2>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead style="background-color: #f0f0f0;">
                <tr>
                    <th>Nível</th>
                    <th>Total Geral</th>
                    <th>Últimos 30 dias</th>
                    <th>Últimos 3 meses</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->nivel }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->ultimos_30 }}</td>
                        <td>{{ $item->ultimos_90 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafico').getContext('2d');
        const grafico = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels, JSON_UNESCAPED_UNICODE) !!},
                datasets: [{
                    label: 'Servidores por Nível',
                    data: {!! json_encode($valores) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: 'white',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false, // mantém tamanho fixo
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endsection
