<?php

namespace App\Http\Livewire\Home\Procedures;

use App\Models\Category;
use App\Models\Typeprocedure;
use App\Models\Procedurehistory;
use App\Models\Fileprocedure;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $categories;
    public $typeprocedures;
    public $requirements;
    public $description;
    public $selectedCategory = NULL;
    public $selectedTypeprocedure = NULL;

    public function updatedselectedCategory($categoryid)
    {
      if(is_null($categoryid) || empty($categoryid)){
        $this->selectedTypeprocedure = NULL;
      }else{
        $this->typeprocedures = Typeprocedure::where([['category_id', $categoryid], ['state', '=', 1]])->get();
        $this->reset('selectedTypeprocedure');
        $this->selectedTypeprocedure = "";
      }
    }

    public function updatedselectedTypeprocedure($typeprocedureid)
    {

      if (is_null($typeprocedureid) || empty($typeprocedureid)) {
        $this->requirements = NULL;
      }else{

        $this->requirements = DB::table('requirement_typeprocedure')
          ->join('requirements', 'requirement_typeprocedure.requirement_id', '=', 'requirements.id')
          ->join('typeprocedures', 'requirement_typeprocedure.typeprocedure_id', '=', 'typeprocedures.id')
          ->where([['requirement_typeprocedure.typeprocedure_id', '=', $typeprocedureid], ['requirements.state', '=', 1 ]])
          ->select('requirements.*')->get(); 
      }
    }

    public function render()
    {
        $this->categories = Category::where([['state', '=', 1]])->get();

        return view('livewire.home.procedures.create');
    }
}
