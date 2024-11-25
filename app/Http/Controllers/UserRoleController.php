<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Docente;


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
         $validated = $request->validate([
            'role' => 'required|in:estudiante,docente,admin',
        ]);
    
        // Cambiar el rol del usuario
        $user->syncRoles($validated['role']);

         // Si el nuevo rol es "docente", agregar el usuario a la tabla docentes
        if ($validated['role'] === 'docente') {
            // Verificar si el usuario ya está en la tabla docentes
            if (!Docente::where('id_usuario', $user->id)->exists()) {
                Docente::create(['id_usuario' => $user->id]);
            }
        } else {
            // Si el rol no es "docente", eliminar al usuario de la tabla docentes
            Docente::where('id_usuario', $user->id)->delete();
        }
 
         // Redirigir con un mensaje de éxito
         return redirect()->route('admin.users.index')->with('success', 'Rol actualizado correctamente.');
     }
}
