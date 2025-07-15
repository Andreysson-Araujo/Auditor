<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Formulario;

class DashboardController extends Controller
{
    public function index()
    {
        $dados = DB::table('servidores')
        ->join('nivel', 'servidores.nivel_id', '=', 'nivel.id')
        ->select('nivel.nivel',
            DB::raw('count(*) as total'),
            DB::raw("SUM(CASE WHEN servidores.created_at >= CURDATE() - INTERVAL 30 DAY THEN 1 ELSE 0 END) as ultimos_30"),
            DB::raw("SUM(CASE WHEN servidores.created_at >= CURDATE() - INTERVAL 3 MONTH THEN 1 ELSE 0 END) as ultimos_90")
        )
        ->groupBy('nivel.nivel')
        ->orderBy('nivel.nivel')
        ->get();

    $labels = $dados->pluck('nivel');
    $valores = $dados->pluck('total');

    return view('dashboard', compact('labels', 'valores', 'dados'));
    }
}