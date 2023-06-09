<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.requirements.index')->only('index');
      $this->middleware('can:admin.requirements.create')->only('create', 'store');
      $this->middleware('can:admin.requirements.edit')->only('edit', 'update');
      $this->middleware('can:admin.requirements.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.requirements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.requirements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:requirements',
            'description' => 'max:255'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado'
          ]
        );
        Requirement::create($request->all()); 
        return redirect()->route('admin.requirements.index')->notice('El requisito se creo correctamente', 'alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requirement $requirement)
    {
        return view('admin.requirements.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requirement $requirement)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:requirements,name,'.$requirement->id,
            'description' => 'max:255'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado'
          ]
        );
        $requirement->update($request->all());
        return redirect()->route('admin.requirements.index')->notice('El requisito se actualizo correctamente', 'alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requirement $requirement)
    {
        //
    }
}
