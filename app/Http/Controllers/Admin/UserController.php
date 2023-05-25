<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:admin.users.index')->only('index');
      $this->middleware('can:admin.users.create')->only('create', 'store');
      $this->middleware('can:admin.users.edit')->only('edit', 'update');
      $this->middleware('can:admin.users.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function generateUniqueCode()
    {
      do {
        $code = random_int(100000, 999999);
      } while (User::where("code", "=", $code)->first());
      return $code;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|max:255|unique:users',
            'area_id' => 'required',
            'description' => 'max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado',
            'email.required' => 'Rellena este campo obligatorio',
            'email.unique' => 'Este correo ya esta tomado',
            'area_id.required' => 'Seleccione este campo obligatorio',
            'password.required' => 'Rellena este campo obligatorio',
            'password_confirmation' => 'Rellena este campo obligatorio',
            'password.confirmed' => 'Ambas contraseñas deben ser iguales'
          ]
        );

        $user = User::create([
          'type' => 9,
          'code' => $this->generateUniqueCode(),
          'name' => $request->name,
          'email' => $request->email,
          'state' => $request->state,
          'area_id' => $request->area_id,
          'email_verified_at' => Carbon::now()->timestamp,
          'is_admin' => true,
          'password' => Hash::make($request->password)
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->notice('El usuario se creo correctamente', 'alert'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
          [
            'name' => 'required|string|max:255|unique:users,name,'.$user->id,
            'email' => 'required|string|max:255|unique:users,email,'.$user->id,
            'area_id' => 'required',
            'description' => 'max:255',
          ],
          [
            'name.required' => 'Rellena este campo obligatorio',
            'name.unique' => 'Este nombre ya esta tomado',
            'email.required' => 'Rellena este campo obligatorio',
            'email.unique' => 'Este correo ya esta tomado',
            'area_id.required' => 'Seleccione este campo obligatorio',
          ]
        );
        $user->update($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->notice('El usuario se actualizo correctamente', 'alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
