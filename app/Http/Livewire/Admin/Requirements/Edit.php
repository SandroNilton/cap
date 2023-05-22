<?php

namespace App\Http\Livewire\Admin\Requirements;

use App\Models\Requirement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{

    public $requirement;
    public $requirement_data;

    public function mount()
    {
        $this->requirement = Route::current()->parameter('requirement');
    }

    public function deleteRequirement($id)
    {
        $requirement_in_typeprocedure = DB::table('requirement_typeprocedure')->join('requirements', 'requirement_typeprocedure.requirement_id', '=', 'requirements.id')->join('typeprocedures', 'requirement_typeprocedure.typeprocedure_id', '=', 'typeprocedures.id')->where([['requirement_typeprocedure.requirement_id', '=', $id]])->select('requirements.*')->get();
        if($requirement_in_typeprocedure->count() > 0){
          $this->notice('El requisito se encuentra en uso actualmente', 'alert');
        } else {
          Requirement::where('id', $id)->delete();
          return redirect()->route('admin.requirements.index')->notice('Se eliminó el requisito correctamente', 'alert');
        }
    }

    public function render()
    {
        $this->requirement_data = Requirement::where([['id', '=', $this->requirement->id]])->get();
        return view('livewire.admin.requirements.edit');
    }
}
