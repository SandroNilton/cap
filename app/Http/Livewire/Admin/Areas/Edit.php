<?php

namespace App\Http\Livewire\Admin\Areas;

use App\Models\Area;
use App\Models\Typeprocedure;
use App\Models\Procedure;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{

    public $area;
    public $area_data;

    public function mount()
    {
        $this->area = Route::current()->parameter('area');
    }

    public function deleteArea($id)
    {
        $area_in_typeprocedure = Typeprocedure::where([['area_id', '=', $id]])->get();
        $area_in_procedure = Procedure::where([['area_id', '=', $id]])->get();
        $area_in_user = User::where([['area_id', '=', $id]])->get();
        if($area_in_typeprocedure->count() > 0 || $area_in_procedure->count() > 0 || $area_in_user->count() > 0){
          $this->notice('El área se encuentra en uso actualmente', 'alert');
        } else {
          Area::where('id', $id)->delete();
          return redirect()->route('admin.areas.index')->notice('Se eliminó el área correctamente', 'alert');
        }
    }

    public function render()
    {
        $this->area_data = Area::where([['id', '=', $this->area->id]])->get();
        return view('livewire.admin.areas.edit');
    }
}
