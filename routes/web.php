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

// Rotas de visualização
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [ConsultController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboardDoctor', [DoctorController::class, 'dashboardDoctor'])->name('dashboardDoctor');
    Route::get('viewEditDoctor', [DoctorController::class, 'viewEdit'])->name('viewEditDoctor');
    Route::get('viewEditConsult', [ConsultController::class, 'viewEdit'])->name('viewEditConsult');
    Route::get('home', [ConsultController::class, 'home'])->name('home');

    // Rotas de edição
    Route::post('create_consult', [ConsultController::class, 'create'])->name('create.consult');
    Route::post('delete_consult', [ConsultController::class, 'delete'])->name('delete.consult');
    Route::post('register_doctor', [DoctorController::class, 'register'])->name('register.doctor');
    Route::post('edit_doctor/{id}', [DoctorController::class, 'Edit'])->name('edit.doctor');
    Route::delete('delete_doctor/{id}', [DoctorController::class, 'delete'])->name('doctorDelete');
    Route::post('edit_consult/{id}', [ConsultController::class, 'Edit'])->name('edit.consult');
    Route::delete('delete_consult/{id}', [ConsultController::class, 'delete'])->name('consultDelete');
});



require __DIR__ . '/auth.php';
