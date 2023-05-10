<?php

namespace App\Http\Livewire\Admin\Users;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Type", "type")
                ->sortable(),
            Column::make("Code", "code")
                ->sortable(),
            Column::make("Code type", "code_type")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Email verified at", "email_verified_at")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Area id", "area_id")
                ->sortable(),
            Column::make("Is admin", "is_admin")
                ->sortable(),
            Column::make("State", "state")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
