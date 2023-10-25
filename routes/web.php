<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculosController;

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

Route::get('/veiculos', [VeiculosController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/create', [VeiculosController::class, 'create']);
Route::post('/veiculos', [VeiculosController::class, 'store']);
Route::get('/veiculos/{id}/edit', [VeiculosController::class, 'edit']);
Route::put('/veiculos/{id}', [VeiculosController::class, 'update']);
Route::delete('/veiculos/{id}', [VeiculosController::class, 'destroy']);
Route::get('/veiculos/{id}', [VeiculosController::class, 'show']);

