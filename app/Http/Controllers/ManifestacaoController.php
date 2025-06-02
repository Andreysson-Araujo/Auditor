<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Formulario;

class ManifestacaoController extends Controller
{
    public function show()
{
    $formularios = Formulario::orderBy('created_at', 'desc')->take(10)->get();

    return view('manifestacao.showManifestacao', compact('formularios'));
}
}
