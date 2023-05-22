<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Edit extends Component
{

    public $customer;
    public $customer_data;

    public function mount()
    {
        $this->customer = Route::current()->parameter('customer');
    }

    public function render()
    {
        $this->customer_data = User::where([['id', '=', $this->customer->id]])->get();
        return view('livewire.admin.customers.edit');
    }
}
