<?php

namespace App\Http\Controllers;

use App\Models\plantas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreplantasRequest;
use App\Http\Requests\UpdateplantasRequest;

class plantasController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-planta|edit-planta|delete-planta', ['only' => ['index','show']]);
       $this->middleware('permission:create-planta', ['only' => ['create','store']]);
       $this->middleware('permission:edit-planta', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-planta', ['only' => ['destroy']]);
    }

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
        $request->validate([
            'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    
        $input = $request->all();


        if ($image = $request->file('Foto')) {

            $destinationPath = 'images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['Foto'] = "$profileImage";

        }

        Plantas::create($input);
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
    public function edit(Plantas $planta) : View
    {
        return view('plantas.edit', [
            'planta' => $planta
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(UpdatePlantasRequest $request, Plantas $planta) : RedirectResponse
     {
       
        $input = $request->all();

        if ($image = $request->file('Foto')) {

            if (file_exists(public_path('images/' . $planta->Foto))){
                $filedeleted = unlink(public_path('images/' . $planta->Foto));
             } 

            $destinationPath = 'images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['Foto'] = "$profileImage";

        }else{

            unset($input['Foto']);

        }

        $planta->update($input); // Exclui o campo 'id' do request

         return redirect()->route('plantas.index')
                 ->withSuccess('planta is updated successfully.');
     }
     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantas $planta) : RedirectResponse
    {
 
        if (file_exists(public_path('images/' . $planta->Foto))){
            $filedeleted = unlink(public_path('images/' . $planta->Foto));
            if ($filedeleted) {
               echo "File deleted";
            }
         } 

        $planta->delete();
        return redirect()->route('plantas.index')
                ->withSuccess('plantas is deleted successfully.');
    }
}