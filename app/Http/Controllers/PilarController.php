<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;

class PilarController extends Controller
{
    public function create(Request $request)
    {
        $servidor_id = $request->query('servidor_id');
        return view('formularios.create', compact('servidor_id'));
    }

    public function store(Request $request)
    {
        // Validação com debug opcional
        $validated = $request->validate([
            'pilar_1' => 'required|integer',
            'pilar_2' => 'required|integer',
            'pilar_3' => 'required|integer',
            'pilar_4' => 'required|integer',
            'pilar_5' => 'required|integer',
            'pilar_6' => 'required|interger',
        ]);

        try {
            Formulario::create([
                'servidores_id' => $validated['servidores_id'],
                'pilar_1' => $validated['pilar_1'],
                'pilar_2' => $validated['pilar_2'],
                'pilar_3' => $validated['pilar_3'],
                'pilar_4' => $validated['pilar_4'],
                'pilar_5' => $validated['pilar_5'],
                'pilar_6' => $validated['pilar_6'],
                'classificate' => $validated['classificate'],
                'comments' => $validated['suggestions']
            ]);
    
            return redirect()->route('servidores.index')->with('msg', 'Resposta enviada com sucesso!');
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro na validação: ' . $e->getMessage()])->withInput();
        }

        
    }
}
