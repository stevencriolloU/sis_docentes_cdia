<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Http\Request;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'), 
    'verified', // Aseguramos que el usuario esté verificado
])->group(function () {
    Route::middleware('role:admin')->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::middleware('role:docente')->get('/docente/dashboard', [DocenteController::class, 'index'])->name('docente.dashboard');
    Route::middleware('role:estudiante')->get('/estudiante/dashboard', [EstudianteController::class, 'index'])->name('estudiante.dashboard');
    
})->name('dashboard');



// Rutas solo accesibles por el rol 'admin'
Route::middleware('role:admin')->group(function () {
    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/users', [UserRoleController::class, 'index'])->name('admin.users.index');
    Route::post('admin/users/{user}/update-role', [UserRoleController::class, 'update'])->name('admin.users.update-role');
});


Route::resource('cursos', App\Http\Controllers\CursoController::class);
Route::resource('docentes', App\Http\Controllers\DocenteController::class);

Route::get('/buscar-usuario', function (Request $request) {
    $email = $request->get('email');
    if($email) {
        $users = User::where('email', 'like', "%$email%")->get();
    } else {
        $users = [];
    }

    return response()->json($users);  // Retorna los resultados en formato JSON
});