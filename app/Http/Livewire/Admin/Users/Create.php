<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Area;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public $areas;
    public $roles;

    public function render()
    {
        $this->roles = Role::all();
        $this->areas = Area::where('state', '=', 1)->get();
        return view('livewire.admin.users.create');
    }
}
