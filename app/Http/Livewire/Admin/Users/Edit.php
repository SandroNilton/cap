<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use App\Models\Area;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{
    public $user;
    public $areas;
    public $user_data;

    public function mount()
    {
        $this->user = Route::current()->parameter('user');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.users.index')->notice('Se eliminó el usuario correctamente', 'alert');
    }

    public function render()
    {   
        $this->user_data = User::where([['id', '=', $this->user->id]])->get();
        $this->areas = Area::where('state', '=', 1)->get();
        return view('livewire.admin.users.edit');
    }
}
