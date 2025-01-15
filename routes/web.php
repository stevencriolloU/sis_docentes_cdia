<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\EncuestaPreguntumController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\OpcioneController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\PreguntaOpcionController;
use App\Http\Controllers\RespuestaController;

//inicio
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'), 
    'verified',
])->group(function () {
    Route::middleware('role:admin')->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::middleware('role:docente')->get('/docente/dashboard', [DocenteController::class, 'dashboard'])->name('docente.dashboard');
    Route::middleware('role:estudiante')->get('/estudiante/dashboard', [EstudianteController::class, 'index'])->name('estudiante.dashboard');
    
})->name('dashboard');



// Rutas solo accesibles por el rol 'admin'
Route::middleware('role:admin')->group(function () {
    Route::get('admin/users', [UserRoleController::class, 'index'])->name('admin.users.index');
    Route::post('admin/users/{user}/update-role', [UserRoleController::class, 'update'])->name('admin.users.update-role');
    Route::resource('encuesta-pregunta', EncuestaPreguntumController::class);
});


// Rutas para los docentes
Route::middleware(['auth', 'role:docente'])->group(function () {
    Route::get('/docente/encuestas/{id}', [EncuestaController::class, 'generated'])->name('encuestas.generated');
});

//Cruds de tablas con middleware de autenticación
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('respuestas', RespuestaController::class);
Route::resource('cursos', CursoController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('preguntas', PreguntaController::class);
Route::resource('opciones', OpcioneController::class);
Route::resource('pregunta-opcions', PreguntaOpcionController::class);
});

//rutas para los estudiantes
Route::middleware(['auth', 'role:estudiante'])->group(function () {
    // Muestra el formulario para responder la encuesta
    Route::get('/encuestas/{uuid}/responder', [EncuestaController::class, 'responder'])->name('encuestas.responder');
    // Almacena las respuestas
    Route::post('/encuestas/{uuid}/respuestas', [RespuestaController::class, 'store'])->name('respuestas.store');
});

//Administrador o docente
Route::middleware(['auth', 'role:admin|docente'])->group(function () {
    Route::resource('encuestas', EncuestaController::class);
    Route::get('/encuestas/{id}/respuestas', [RespuestaController::class, 'show'])->name('respuestas.show');
    Route::get('/encuestas/{id}/respuestas/graficos', [RespuestaController::class, 'visualShow'])->name('respuestas.visualshow');
    // Generacion de PDF
    Route::get('/encuestas/{id}/pdf', [RespuestaController::class, 'downloadPDF'])->name('respuestas.downloadPDF');
    // Ruta para acceder al formulario de generación de reportes
    Route::get('/reportes', [EncuestaController::class, 'mostrarFormularioReportes'])->name('reportes.form');
    Route::post('/reportes', [EncuestaController::class, 'generarReporte'])->name('reportes.generar');

});
//welcome de tony
Route::get('/', function () {return view('welcome');})->name('welcome');
