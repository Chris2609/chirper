<?php

use App\Http\Controllers\OpinionControlador;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/verOpiniones', [OpinionControlador::class,'ver'])->name('verOpiniones');

Route::get('/insertarOpinion', [OpinionControlador::class, 'vistaInsertarOpinion'])->name('insertarOpinion');

Route::post('/insertarOpinion/insertar', [OpinionControlador::class,'insertarOpinion'])->name('insertarOpinion.insertar');

Route::get('/eliminarOpinion/{id}', [OpinionControlador::class, 'eliminarOpinion'])->name('eliminarOpinion');

Route::get('/modificarOpinion/{id}', [OpinionControlador::class, 'vistaModificar'])->name('formularioModificar');

Route::post('/modificarOpinion', [OpinionControlador::class, 'modificarOpinion'])->name('modificarOpinion');


require __DIR__.'/auth.php';
