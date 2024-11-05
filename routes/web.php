<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VisitantesController;
use App\Http\Controllers\VisitasController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Ruta principal
Route::get('/', function () {
    return view('auth.login');
});



// Ruta para reporte
Route::get('/reporte', [ReportController::class,'reporteUno']);

// Rutas para Visitas
Route::prefix('visitas')->group(function () {
    Route::get('show', [VisitasController::class, 'index'])->name('visitas.index'); // Listar visitas
    Route::get('create', [VisitasController::class, 'create'])->name('visitas.create'); // Formulario para crear visita
    Route::post('store', [VisitasController::class, 'store'])->name('visitas.store'); // Almacenar visita
    Route::get('edit/{id}', [VisitasController::class, 'edit'])->name('visitas.edit'); // Formulario para editar visita
    Route::put('update/{id}', [VisitasController::class, 'update'])->name('visitas.update'); // Actualizar visita
    Route::delete('destroy/{id}', [VisitasController::class, 'destroy'])->name('visitas.destroy'); // Eliminar visita
});



// Rutas para Visitantes
Route::prefix('visitantes')->group(function () {
    Route::get('show', [VisitantesController::class, 'index'])->name('visitantes.index'); // Listar visitantes
    Route::get('create', [VisitantesController::class, 'create'])->name('visitantes.create'); // Formulario para crear visitante
    Route::post('store', [VisitantesController::class, 'store'])->name('visitantes.store'); // Almacenar visitante
    Route::get('edit/{id}', [VisitantesController::class, 'edit'])->name('visitantes.edit'); // Formulario para editar visitante
    Route::put('update/{id}', [VisitantesController::class, 'update'])->name('visitantes.update'); // Actualizar visitante
    Route::delete('destroy/{id}', [VisitantesController::class, 'destroy'])->name('visitantes.destroy'); // Eliminar visitante
});



//usuario de oficina
Route::prefix('usuarios')->group(function () {
    Route::get('', [UsuariosController::class, 'index'])->name('usuarios.index'); // Mostrar todos los usuarios
    Route::get('create', [UsuariosController::class, 'create'])->name('usuarios.create'); // Crear usuario
    Route::post('store', [UsuariosController::class, 'store'])->name('usuarios.store'); // Almacenar usuario
    Route::get('edit/{ID}', [UsuariosController::class, 'edit'])->name('usuarios.edit'); // Editar usuario
    Route::put('update/{ID}', [UsuariosController::class, 'update'])->name('usuarios.update'); // Actualizar usuario
    Route::delete('delete/{ID}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy'); // Eliminar usuario
    Route::get('show/{ID}', [UsuariosController::class, 'show'])->name('usuarios.show'); // Mostrar detalles del usuario
});



// Rutas para Trámites

Route::prefix('tramites')->group(function () {
    Route::get('show', [TramitesController::class, 'index'])->name('tramites.index');
    Route::get('/create', [TramitesController::class, 'create'])->name('tramites.create');
    Route::post('store', [TramitesController::class, 'store'])->name('tramites.store');
    Route::get('/{ID_Tramite}', [TramitesController::class, 'show'])->name('tramites.show');
    Route::get('/{ID_Tramite}/edit', [TramitesController::class, 'edit'])->name('tramites.edit');
    Route::put('/{ID_Tramite}', [TramitesController::class, 'update'])->name('tramites.update');
    Route::delete('/{ID_Tramite}', [TramitesController::class, 'destroy'])->name('tramites.destroy');
});


// Informes
Route::prefix('informes')->group(function () {
    Route::get('/', [InformeController::class, 'index'])->name('informes.index');
    Route::get('create', [InformeController::class, 'create'])->name('informes.create');
    Route::post('store', [InformeController::class, 'store'])->name('informes.store');
    Route::get('edit/{id}', [InformeController::class, 'edit'])->name('informes.edit');
    Route::put('update/{id}', [InformeController::class, 'update'])->name('informes.update');
    Route::delete('destroy/{id}', [InformeController::class, 'destroy'])->name('informes.destroy');
});





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
