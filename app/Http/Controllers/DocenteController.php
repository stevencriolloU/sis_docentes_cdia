<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DocenteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DocenteController extends Controller
{
   
    public function index(Request $request): View
    {
        $docentes = Docente::paginate();

        return view('docente.index', compact('docentes'))
            ->with('i', ($request->input('page', 1) - 1) * $docentes->perPage());
    }

   
    public function create(): View
    {
        $docente = new Docente(); // Crea una nueva instancia para el formulario
        return view('docente.create', compact('docente'));
    }


    public function store(DocenteRequest $request): RedirectResponse
    {
    
        Docente::create($request->validated());

        return Redirect::route('docentes.index')
            ->with('success', 'Docente creado con éxito.');
    }

    public function show($id): View
    {
        // Carga el docente con el usuario relacionado
        $docente = Docente::with('user')->findOrFail($id);
        return view('docente.show', compact('docente'));
    }

    public function edit($id): View
    {
        
        $docente = Docente::with('user')->findOrFail($id);
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocenteRequest $request, Docente $docente): RedirectResponse
    {
        // Actualiza el docente con los datos validados
        $docente->update($request->validated());

        // Redirige con mensaje de éxito
        return redirect()->route('docentes.index')
            ->with('success', 'Docente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        // Elimina el docente
        Docente::findOrFail($id)->delete();

        return Redirect::route('docentes.index')
            ->with('success', 'Docente eliminado con éxito.');
    }

    /**
     * Mostrar el dashboard del docente.
     */
    public function dashboard(): View
    {
        return view('docente.dashboard');
    }
}
