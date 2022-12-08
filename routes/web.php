<?php

use App\Http\Controllers\ConsultController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::fallback(function () {
    return '<h1 style="text-align: center; color: red;">Página não encontrada!</h1>';
});

Route::get('dashboard', [ConsultController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('home', [ConsultController::class, 'home'])->middleware(['auth'])->name('home');

// Rota para criação de notas
Route::post('create_consult', [ConsultController::class, 'create'])->name('create.consult');
Route::post('delete_consult', [ConsultController::class, 'delete'])->name('delete.consult');
Route::post('register_doctor', [DoctorController::class, 'register'])->name('register.doctor');

require __DIR__.'/auth.php';
