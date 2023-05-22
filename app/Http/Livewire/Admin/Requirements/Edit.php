<?php

namespace App\Http\Livewire\Admin\Requirements;

use App\Models\Requirement;
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

    public function render()
    {
        $this->requirement_data = Requirement::where([['id', '=', $this->requirement->id]])->get();
        return view('livewire.admin.requirements.edit');
    }
}
