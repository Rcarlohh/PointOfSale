<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::delete('/usuarios/eliminar/{id}', [UserController::class, 'destroy'])->name('usuarios.eliminar');
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

