<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Typeprocedure;
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

    public function deleteCategory($id)
    {
        $category_in_typeprocedure = Typeprocedure::where([['category_id', '=', $id]])->get();
        if($category_in_typeprocedure->count() > 0){
          $this->notice('La categoría se encuentra en uso actualmente', 'alert');
        } else {
          Category::where('id', $id)->delete();
          return redirect()->route('admin.categories.index')->notice('Se eliminó la categoría correctamente', 'alert');
        }
    }

    public function render()
    {
        $this->category_data = Category::where([['id', '=', $this->category->id]])->get();
        return view('livewire.admin.categories.edit');
    }
}
