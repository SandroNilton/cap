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
    public function show(Typeprocedure $typeprocedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Typeprocedure $typeprocedure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Typeprocedure $typeprocedure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Typeprocedure $typeprocedure)
    {
        //
    }
}
