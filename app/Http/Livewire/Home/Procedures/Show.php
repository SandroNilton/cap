<?php

namespace App\Http\Livewire\Home\Procedures;

use Livewire\Component;
use App\Models\Procedure;
use App\Models\Fileprocedure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Show extends Component
{
    use WithFileUploads;

    public $procedure_files;
    public $procedure;
    public $procedure_data;
    public $file_finish = [];
    public $procedure_files_finish;
    public $procedure_files_refused;

    public function mount()
    {
        $this->procedure = Route::current()->parameter('procedure');
    }

    public function render()
    {
        $this->procedure_data = Procedure::where([['id', '=', $this->procedure->id]])->get();
        $this->procedure_files_refused = Fileprocedure::where([['procedure_id', '=', $this->procedure->id], ['state', '=', 3]])->get();
        $this->procedure_files_finish = Fileprocedure::where([['procedure_id', '=', $this->procedure->id], ['state', '=', 4]])->get();;
        return view('livewire.home.procedures.show');
    }
}
