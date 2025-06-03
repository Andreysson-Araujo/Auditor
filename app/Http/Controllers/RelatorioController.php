<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Support\Carbon;

class RelatorioController extends Controller
{
    public function index()
    {
        $formularios = Formulario::with('servidor.orgao')
            ->orderBy('created_at', 'desc')
            ->get();

        // Contagens
        $total = $formularios->count();

        $mesAtual = Formulario::whereMonth('created_at', now()->month)
                              ->whereYear('created_at', now()->year)
                              ->count();

        $semanaAtual = Formulario::whereBetween('created_at', [
                                Carbon::now()->startOfWeek(),
                                Carbon::now()->endOfWeek()
                            ])->count();

        return view('relatorios.index', compact('formularios', 'total', 'mesAtual', 'semanaAtual'));
    }
}
