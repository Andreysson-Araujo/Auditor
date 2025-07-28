<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'formulario_id' => 'required|exists:formularios,id',
            'mensagem' => 'required|string|max:1000',
        ]);

        $feedback = Feedback::create([
            'formulario_id' => $validated['formulario_id'],
            'user_id' => Auth::id(),
            'mensagem' => $validated['mensagem'],
        ]);

        return response()->json([
            'message' => 'Feedback enviado com sucesso.',
            'data' => $feedback
        ], 201);
    }


    // (Opcional) listar feedbacks
    public function index()
    {
        return Feedback::with(['user', 'formulario'])->get();
    }

    // (Opcional) mostrar um feedback específico
    public function show($id)
    {
        $feedback = Feedback::with(['user', 'formulario'])->findOrFail($id);
        return response()->json($feedback);
    }

    public function showFeedbackView()
    {
        $feedbacks = Feedback::with(['user', 'formulario'])->get();

        return view('feedback', compact('feedbacks'));
    }
}
