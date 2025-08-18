<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Formulario;

class FeedbackController extends Controller
{
    public function __construct() {}

    public function store(Request $request)
    {
        $request->validate([
            'formulario_id' => 'required|exists:formularios,id',
            'mensagem' => 'required|string',
        ]);

        Feedback::create([
            'formulario_id' => $request->formulario_id,
            'user_id' => auth()->id(), // se estiver autenticado
            'mensagem' => $request->mensagem,
            'confirm' => false,
        ]);
        // Marca o formulário como auditado
        $formulario = Formulario::findOrFail($request->formulario_id);
        $formulario->auditado = true;
        $formulario->save();

        return redirect()->route('manifestacoes')
                     ->with('success', 'Feedback salvo e manifestação auditada!');
    }



    // (Opcional) listar feedbacks
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'formulario'])->get();

        return view('feedbacks.show', compact('formulario'));    }

    // (Opcional) mostrar um feedback específico
    public function show($id)
    {
        $formulario = Formulario::findOrFail($id);
        return view('audition.feedback', compact('formulario'));
    }


    public function showFeedbackView()
    {
        $feedbacks = Feedback::with(['user', 'formulario'])->get();

        return view('feedback', compact('feedbacks'));
    }
}
