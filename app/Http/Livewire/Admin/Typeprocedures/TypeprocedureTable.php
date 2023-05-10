<?php

namespace App\Http\Livewire\Admin\Typeprocedures;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Typeprocedure;

class TypeprocedureTable extends DataTableComponent
{
    protected $model = Typeprocedure::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Area id", "area_id")
                ->sortable(),
            Column::make("Category id", "category_id")
                ->sortable(),
            Column::make("Price", "price")
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
