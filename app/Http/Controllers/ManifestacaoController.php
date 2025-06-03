<?php

namespace App\Http\Controllers;

use App\Models\Formulario;

class ManifestacaoController extends Controller
{
    public function show()
    {
        $formularios = Formulario::with('servidor.orgao')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('manifestacao.showManifestacao', compact('formularios'));
    }

    public function ver($id)
{
    $formulario = Formulario::with('servidor.orgao')->findOrFail($id);
    return view('manifestacao.detalhes', compact('formulario'));
}

}
