<?php

namespace App\Http\Controllers;

use App\Models\PreguntaOpcion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PreguntaOpcionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PreguntaOpcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $preguntaOpcions = PreguntaOpcion::with(['pregunta', 'opcion'])->paginate();

        return view('pregunta-opcion.index', compact('preguntaOpcions'))
            ->with('i', ($request->input('page', 1) - 1) * $preguntaOpcions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $preguntaOpcion = new PreguntaOpcion();

        return view('pregunta-opcion.create', compact('preguntaOpcion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PreguntaOpcionRequest $request): RedirectResponse
    {
        PreguntaOpcion::create($request->validated());

        return Redirect::route('pregunta-opcions.index')
            ->with('success', 'PreguntaOpcion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $preguntaOpcion = PreguntaOpcion::find($id);

        return view('pregunta-opcion.show', compact('preguntaOpcion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $preguntaOpcion = PreguntaOpcion::find($id);

        return view('pregunta-opcion.edit', compact('preguntaOpcion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PreguntaOpcionRequest $request, PreguntaOpcion $preguntaOpcion): RedirectResponse
    {
        $preguntaOpcion->update($request->validated());

        return Redirect::route('pregunta-opcions.index')
            ->with('success', 'PreguntaOpcion updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PreguntaOpcion::find($id)->delete();

        return Redirect::route('pregunta-opcions.index')
            ->with('success', 'PreguntaOpcion deleted successfully');
    }
}
