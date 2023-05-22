<?php

namespace App\Http\Livewire\Admin\Typeprocedures;

use App\Models\Area;
use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $this->areas = Area::where('state', '=', 1)->get();
        $this->categories = Category::where('state', '=', 1)->get();
        return view('livewire.admin.typeprocedures.create');
    }
}
