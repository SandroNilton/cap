<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.roles.index')->only('index');
      $this->middleware('can:admin.roles.create')->only('create', 'store');
      $this->middleware('can:admin.roles.edit')->only('edit', 'update');
      $this->middleware('can:admin.roles.destroy')->only('destroy');
    }

    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado'
          ]
        );
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->notice('El rol se actualizo correctamente', 'alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      //
    }
}
