<?php

namespace App\Http\Livewire\Admin\Roles;

use Spatie\Permission\Models\Permission;
use Livewire\Component;

class Create extends Component
{ 
    public $permissions;

    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.admin.roles.create');
    }
}
