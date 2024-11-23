<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EncuestaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $encuestas = Encuesta::paginate();

        return view('encuesta.index', compact('encuestas'))
            ->with('i', ($request->input('page', 1) - 1) * $encuestas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $encuesta = new Encuesta();

        return view('encuesta.create', compact('encuesta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EncuestaRequest $request): RedirectResponse
    {
        Encuesta::create($request->validated());

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.edit', compact('encuesta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EncuestaRequest $request, Encuesta $encuesta): RedirectResponse
    {
        $encuesta->update($request->validated());

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Encuesta::find($id)->delete();

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta deleted successfully');
    }
}
