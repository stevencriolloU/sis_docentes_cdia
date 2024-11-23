<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ParaleloRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $paralelos = Paralelo::paginate();

        return view('paralelo.index', compact('paralelos'))
            ->with('i', ($request->input('page', 1) - 1) * $paralelos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $paralelo = new Paralelo();

        return view('paralelo.create', compact('paralelo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParaleloRequest $request): RedirectResponse
    {
        Paralelo::create($request->validated());

        return Redirect::route('paralelos.index')
            ->with('success', 'Paralelo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $paralelo = Paralelo::find($id);

        return view('paralelo.show', compact('paralelo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $paralelo = Paralelo::find($id);

        return view('paralelo.edit', compact('paralelo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParaleloRequest $request, Paralelo $paralelo): RedirectResponse
    {
        $paralelo->update($request->validated());

        return Redirect::route('paralelos.index')
            ->with('success', 'Paralelo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Paralelo::find($id)->delete();

        return Redirect::route('paralelos.index')
            ->with('success', 'Paralelo deleted successfully');
    }
}
