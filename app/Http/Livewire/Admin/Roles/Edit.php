<?php

namespace App\Http\Livewire\Admin\Roles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{
    public $role;
    public $role_data;
    public $permissions;

    public function mount()
    {
        $this->role = Route::current()->parameter('role');
    }

    public function deleteRole($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->route('admin.roles.index')->notice('Se eliminó el rol correctamente', 'alert');
    }

    public function render()
    {
        $this->role_data = Role::where([['id', '=', $this->role->id]])->get();
        $this->permissions = Permission::all();
        return view('livewire.admin.roles.edit');
    }
}
