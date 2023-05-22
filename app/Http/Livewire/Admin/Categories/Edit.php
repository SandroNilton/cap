<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{

    public $category;
    public $category_data;

    public function mount()
    {
        $this->category = Route::current()->parameter('category');
    }

    public function render()
    {
        $this->category_data = Category::where([['id', '=', $this->category->id]])->get();
        return view('livewire.admin.categories.edit');
    }
}
