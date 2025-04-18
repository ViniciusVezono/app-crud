<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class);

Route::resource('clientes', ClienteController::class);

Route::resource('vendas', VendaController::class);

Route::get('/clientes/{cliente}/vendas/create', [\App\Http\Controllers\VendaController::class, 'create'])->name('clientes.vendas.create');
Route::patch('/vendas/{id}/receber', [VendaController::class, 'marcarComoRecebida'])->name('vendas.receber');
Route::get('/relatorio-vendas', [VendaController::class, 'relatorio'])->name('vendas.relatorio');

require __DIR__.'/auth.php';
