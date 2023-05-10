<?php

namespace App\Http\Livewire\Admin\Areas;

use Livewire\Component;

class Index extends Component
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
      return view('livewire.admin.areas.index');
    }
}
