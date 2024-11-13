<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{    
    // Mostrar la lista de usuarios con sus roles
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }    
    
     // Actualizar el rol de un usuario
     public function update(Request $request, User $user)
     {
         // Validar que el rol enviado existe
         $request->validate([
             'role' => 'required|in:admin,docente,estudiante', // Roles permitidos
         ]);
 
         // Asignar el nuevo rol al usuario
         $user->syncRoles([$request->role]);
 
         // Redirigir con un mensaje de éxito
         return redirect()->route('admin.users.index')->with('success', 'Rol actualizado correctamente.');
     }
}
