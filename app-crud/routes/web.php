<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use  App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']) ->name('home');


Route::get('/users', [UserController::class, 'index']) ->name('users.index');
Route::get('/users/create', [UserController::class, 'create']) ->name('users.create'); //rota para a criação do formulario
Route::post('/users', [UserController::class, 'store']) ->name('users.store');//rota para enviar os dados 
Route::get('/users/{user}', [UserController::class, 'show']) ->name('users.show'); //rota retornar um usuario especifico
Route::get('/users/{user}/edit', [UserController::class, 'edit']) ->name('users.edit'); //rota para formulario editar o usuario
Route::put('/users/{user}', [UserController::class, 'update']) ->name('users.update'); //rota para enviar as ediçoes
Route::delete('/users/{user}', [UserController::class, 'destroy']) ->name('users.destroy'); //rota para a 



