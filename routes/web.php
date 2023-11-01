<?php

use App\Http\Controllers\FaturamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\MecanicoController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('veiculos', VeiculosController::class);
    Route::get('veiculos/exportar-veiculos', [VeiculosController::class, 'exportarExcel'])->name('veiculos.exportar');

    Route::resource('manutencoes', ManutencaoController::class);
    Route::get('/manutencao/exportar-pdf', [ManutencaoController::class, 'exportarPDF'])->name('manutencao.exportar-pdf');

    Route::resource('mecanicos', MecanicoController::class);

    Route::resource('faturamento', FaturamentoController::class);

});

require __DIR__ . '/auth.php';
