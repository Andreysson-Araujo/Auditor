<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManifestacaoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\PilarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('login', function () {
    return view('welcome');
});
*/
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rota protegida de exemplo
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios');
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');


//Manifestações
Route::get('/manifestacoes', [ManifestacaoController::class, 'show'])->name('manifestacoes');
Route::get('/manifestacao/{id}', [ManifestacaoController::class, 'ver'])->name('manifestacao.ver');
Route::post('/manifestacoes/auditar/{id}', [ManifestacaoController::class, 'auditar'])->name('manifestacoes.auditar');

//Feedbacks

Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/ver-feedbacks', [FeedbackController::class, 'showFeedbackView'])->name('feedback.view');
Route::get('/feedbacks/manisfestacao/{id}', [FeedbackController::class, 'show'])->name('feedback.show');
Route::resource('perguntas', PerguntaController::class);
Route::resource('pilares', PilarController::class);