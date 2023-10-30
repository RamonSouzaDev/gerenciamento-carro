<?php

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
    Route::get('/veiculos', [VeiculosController::class, 'index'])->name('veiculos.index');
    Route::get('/veiculos/create', [VeiculosController::class, 'create'])->name('veiculo.create');
    Route::post('/veiculos/store', [VeiculosController::class, 'store'])->name('veiculo.store');
    Route::post('/veiculos', [VeiculosController::class, 'destroy'])->name('veiculos.destroy');
    Route::put('/veiculos/{id}', [VeiculosController::class, 'update'])->name('veiculo.update');;
    Route::get('/veiculos/{id}', [VeiculosController::class, 'show']);
    Route::get('/veiculos/{veiculo}/edit', [VeiculosController::class, 'edit'])->name('veiculos.edit');
    Route::delete('/veiculos/{veiculo}', [VeiculosController::class, 'destroy'])->name('veiculos.destroy');
    Route::get('/exportar-veiculos', [VeiculosController::class, 'exportarExcel'])->name('veiculos.exportar');

    Route::resource('manutencoes', ManutencaoController::class);

    Route::resource('mecanicos', MecanicoController::class);
});

require __DIR__ . '/auth.php';
