<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Exemplo: contar formulários por data
        $dados = DB::table('formularios')
            ->select(DB::raw('DATE(created_at) as data'), DB::raw('count(*) as total'))
            ->groupBy('data')
            ->orderBy('data')
            ->get();

        $labels = $dados->pluck('data');
        $valores = $dados->pluck('total');

        return view('dashboard', compact('labels', 'valores'));
    }
}