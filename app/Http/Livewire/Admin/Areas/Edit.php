<?php

namespace App\Http\Livewire\Admin\Areas;

use App\Models\Area;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Illuminate\Http\Request;

class Edit extends Component
{

    public $area;
    public $area_data;

    public function mount()
    {
        $this->area = Route::current()->parameter('area');
    }

    public function render()
    {
        $this->area_data = Area::where([['id', '=', $this->area->id]])->get();
        return view('livewire.admin.areas.edit');
    }
}
