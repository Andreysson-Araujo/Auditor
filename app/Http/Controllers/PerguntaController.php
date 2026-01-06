<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pergunta;
use App\Models\Pilar;

use function Ramsey\Uuid\v1;

class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perguntas = Pergunta::all();
        return view('perguntas.index', compact('perguntas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        $pilares = Pilar::all();
        return view('perguntas.create', compact('pilares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pilar_id' => 'required|exists:pilares,id',
            'texto_pergunta' => 'required|string|max:1000',
        ]);
        Pergunta::create($validated);
        return redirect()->route('perguntas.index')->with('success', 'Pergunta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pergunta = Pergunta::findOrFail($id);
        return view('perguntas.show', compact('pergunta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pergunta = Pergunta::findOrFail($id);
        $pilares = Pilar::all();
        return view('perguntas.edit', compact('pergunta', 'pilares'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'pilar_id' => 'required|exists:pilares,id',
            'texto_pergunta' => 'required|string|max:1000',
        ]);
        $pergunta = Pergunta::findOrFail($id);
        $pergunta->update($validated);
        return redirect()->route('perguntas.index')->with('success', 'Pergunta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pergunta = Pergunta::findOrFail($id);
        $pergunta->delete();

        return redirect()->route('perguntas.index')->with('success', 'Pergunta deletada com sucesso!');
    }
}
