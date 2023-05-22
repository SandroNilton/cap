<?php

namespace App\Http\Livewire\Admin\Typeprocedures;

use App\Models\Typeprocedure;
use App\Models\Procedure;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{
    public $typeprocedure;
    public $areas;
    public $categories;
    public $typeprocedure_data;

    public function mount()
    {
        $this->typeprocedure = Route::current()->parameter('typeprocedure');
    }

    public function deleteTypeprocedure($id)
    {   
        $typeprocedure_in_procedure = Procedure::where([['typeprocedure_id', '=', $id]])->get();
        if($typeprocedure_in_procedure->count() > 0){
          return redirect()->route('admin.typeprocedures.edit', $id)->notice('El tipo de trámite se encuentra en uso actualmente', 'alert');
        } else {
          Typeprocedure::where('id', $id)->delete();
          return redirect()->route('admin.typeprocedures.index')->notice('Se eliminó el tipo de trámite correctamente', 'alert');
        }
    }

    public function render()
    {
        $this->typeprocedure_data = Typeprocedure::where([['id', '=', $this->typeprocedure->id]])->get();
        $this->areas = Area::where('state', '=', 1)->get();
        $this->categories = Category::where('state', '=', 1)->get();
        return view('livewire.admin.typeprocedures.edit');
    }
}
