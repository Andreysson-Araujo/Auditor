<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        // Totais gerais
        $totalGeral = Formulario::count();
        $totalMes = Formulario::whereMonth('created_at', now()->month)
                              ->whereYear('created_at', now()->year)
                              ->count();

        $totalSemana = Formulario::whereBetween('created_at', [
                                Carbon::now()->startOfWeek(),
                                Carbon::now()->endOfWeek()
                            ])->count();

        // Filtro por período
        $formulariosFiltrados = collect(); // coleção vazia por padrão

        if ($request->filled(['data_inicio', 'data_fim'])) {
            $dataInicio = Carbon::parse($request->data_inicio)->startOfDay();
            $dataFim = Carbon::parse($request->data_fim)->endOfDay();

            $formulariosFiltrados = Formulario::with('servidor.orgao')
                ->whereBetween('created_at', [$dataInicio, $dataFim])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('relatorios.index', compact(
            'totalGeral',
            'totalMes',
            'totalSemana',
            'formulariosFiltrados'
        ));
    }
}
