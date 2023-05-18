<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public $selectTypeuser;
    public $optionSelected;
    public $typeuserSelected;
    public $optiontypeuserSelected;
    public $selectTypeCode;

    public function updatedSelectTypeuser($value)
    {
        $this->optionSelected = $value;
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
