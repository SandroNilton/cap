<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Typeprocedure;
use Illuminate\Http\Request;

class TypeprocedureController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.typeprocedures.index')->only('index');
      $this->middleware('can:admin.typeprocedures.create')->only('create', 'store');
      $this->middleware('can:admin.typeprocedures.edit')->only('edit', 'update');
      $this->middleware('can:admin.typeprocedures.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.typeprocedures.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.typeprocedures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:typeprocedures',
            'area_id' => 'required',
            'category_id' => 'required',
            'description' => 'max:255',
            'price' => 'required',
            'requirements' => 'required'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado',
            'area_id.required' => 'Seleccione este campo obligatorio',
            'category_id.required' => 'Seleccione este campo obligatorio',
            'price.required' => 'Rellena este campo obligatorio',
            'requirements.required' => 'Es necesario seleccionar requisitos'
          ]
        );
        $typeprocedure = Typeprocedure::create($request->all()); 
        $typeprocedure->requirements()->sync($request->requirements);
        return redirect()->route('admin.typeprocedures.index')->notice('El tipo de trámite se creo correctamente', 'alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(Typeprocedure $typeprocedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Typeprocedure $typeprocedure)
    {
        return view('admin.typeprocedures.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Typeprocedure $typeprocedure)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:typeprocedures,name,'.$typeprocedure->id,
            'area_id' => 'required',
            'category_id' => 'required',
            'description' => 'max:255',
            'price' => 'required',
            'requirements' => 'required'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado',
            'area_id.required' => 'Seleccione este campo obligatorio',
            'category_id.required' => 'Seleccione este campo obligatorio',
            'price.required' => 'Rellena este campo obligatorio',
            'requirements.required' => 'Es necesario seleccionar requisitos'
          ]
        );
        $typeprocedure->update($request->all());
        $typeprocedure->requirements()->sync($request->requirements);
        return redirect()->route('admin.typeprocedures.index')->notice('El tipo de trámite se actualizo correctamente', 'alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Typeprocedure $typeprocedure)
    {
        //
    }
}
