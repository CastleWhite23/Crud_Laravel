<?php

namespace App\Http\Controllers;

use App\Models\plantas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreplantasRequest;
use App\Http\Requests\UpdateplantasRequest;

class plantasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('plantas.index', [
            'plantas' => Plantas::latest()->paginate(3)
        ]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('plantas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantasRequest $request) : RedirectResponse
    {
        Plantas::create($request->all());
        return redirect()->route('plantas.index')
                ->withSuccess('Nova Planta adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plantas $planta) : View
    {
        return view('plantas.show', [
            'planta' => $planta
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plantas $plantas) : View
    {
        return view('plantas.edit', [
            'plantas' => $plantas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantasRequest $request, Plantas $plantas) : RedirectResponse
    {
        $plantas->update($request->all());
        return redirect()->back()
                ->withSuccess('plantas is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantas $plantas) : RedirectResponse
    {
        $plantas->delete();
        return redirect()->route('plantas.index')
                ->withSuccess('plantas is deleted successfully.');
    }
}