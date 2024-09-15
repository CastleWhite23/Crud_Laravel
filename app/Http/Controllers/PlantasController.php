<?php

namespace App\Http\Controllers;

use App\Models\Plantas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePlantasRequest;
use App\Http\Requests\UpdatePlantasRequest;

class PlantasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('Plantas.index', [
            'Plantas' => Plantas::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('Plantas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantasRequest $request) : RedirectResponse
    {
        Plantas::create($request->all());
        return redirect()->route('Plantas.index')
                ->withSuccess('Nova Planta adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plantas $Plantas) : View
    {
        return view('Plantas.show', [
            'Plantas' => $Plantas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plantas $Plantas) : View
    {
        return view('Plantas.edit', [
            'Plantas' => $Plantas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantasRequest $request, Plantas $Plantas) : RedirectResponse
    {
        $Plantas->update($request->all());
        return redirect()->back()
                ->withSuccess('Plantas is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantas $Plantas) : RedirectResponse
    {
        $Plantas->delete();
        return redirect()->route('Plantas.index')
                ->withSuccess('Plantas is deleted successfully.');
    }
}