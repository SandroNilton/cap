<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Area;
use Livewire\Component;

class Create extends Component
{
    public $areas;

    public function render()
    {
        $this->areas = Area::where('state', '=', 1)->get();
        return view('livewire.admin.users.create');
    }
}
