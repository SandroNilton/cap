<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.categories.index')->only('index');
      $this->middleware('can:admin.categories.create')->only('create', 'store');
      $this->middleware('can:admin.categories.edit')->only('edit', 'update');
      $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'max:255'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado'
          ]
        );
        Category::create($request->all()); 
        return redirect()->route('admin.categories.index')->notice('La categoria se creo correctamente', 'alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'max:255'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado'
          ]
        );
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->notice('La categoria se actualizo correctamente', 'alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
