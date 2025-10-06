<?php

namespace App\Http\Controllers;

use App\Models\Formulario;

class ManifestacaoController extends Controller
{
    public function show()
    {
        $data = request('data'); // Pega a data da URL
    
        $query = Formulario::with('servidor.orgao', 'servidor.central')
            ->orderBy('created_at', 'desc');
    
        if ($data) {
            $query->whereDate('created_at', $data);
        }
    
        $formularios = $query->paginate(10);
    
        return view('manifestacao.showManifestacao', compact('formularios', 'data'));
    }

    public function ver($id)
{
    $formulario = Formulario::with('servidor.orgao', 'servidor.central')->findOrFail($id);
    return view('manifestacao.detalhes', compact('formulario'));
}
public function auditar($id)
{

    $formulario = Formulario::findOrFail($id);
    $formulario->auditado = true;
    $formulario->save();
    return redirect()->route('manifestacoes')->with('success', 'Formulário auditado com sucesso!');}

}
