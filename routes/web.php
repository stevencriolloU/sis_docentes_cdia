<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Rutas solo accesibles por el rol 'admin'
Route::middleware('role:admin')->group(function () {
    Route::get('admin/users', [UserRoleController::class, 'index'])->name('admin.users.index');
    Route::post('admin/users/{user}/update-role', [UserRoleController::class, 'update'])->name('admin.users.update-role');
});