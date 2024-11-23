<?php

namespace App\Http\Controllers;

use App\Models\Cursoparalelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursoparaleloRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CursoparaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cursoparalelos = Cursoparalelo::paginate();

        return view('cursoparalelo.index', compact('cursoparalelos'))
            ->with('i', ($request->input('page', 1) - 1) * $cursoparalelos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cursoparalelo = new Cursoparalelo();

        return view('cursoparalelo.create', compact('cursoparalelo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoparaleloRequest $request): RedirectResponse
    {
        Cursoparalelo::create($request->validated());

        return Redirect::route('cursoparalelos.index')
            ->with('success', 'Cursoparalelo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cursoparalelo = Cursoparalelo::find($id);

        return view('cursoparalelo.show', compact('cursoparalelo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cursoparalelo = Cursoparalelo::find($id);

        return view('cursoparalelo.edit', compact('cursoparalelo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoparaleloRequest $request, Cursoparalelo $cursoparalelo): RedirectResponse
    {
        $cursoparalelo->update($request->validated());

        return Redirect::route('cursoparalelos.index')
            ->with('success', 'Cursoparalelo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Cursoparalelo::find($id)->delete();

        return Redirect::route('cursoparalelos.index')
            ->with('success', 'Cursoparalelo deleted successfully');
    }
}
