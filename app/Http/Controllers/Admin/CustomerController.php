<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.customers.index')->only('index');
      $this->middleware('can:admin.customers.create')->only('create', 'store');
      $this->middleware('can:admin.customers.edit')->only('edit', 'update');
      $this->middleware('can:admin.customers.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customers.index');
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
    public function show(User $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        return view('admin.customers.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        $customer->state = $request->state;
        $customer->update();
        return redirect()->route('admin.customers.index')->notice('El cliente se actualizo correctamente', 'alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $area)
    {
        //
    }
}
