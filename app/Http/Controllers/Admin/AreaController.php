<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.areas.index')->only('index');
      $this->middleware('can:admin.areas.create')->only('create', 'store');
      $this->middleware('can:admin.areas.edit')->only('edit', 'update');
      $this->middleware('can:admin.areas.destroy')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.areas.index');
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
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        //
    }
}
