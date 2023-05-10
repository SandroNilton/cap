<?php

namespace App\Http\Livewire\Home\Procedures;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Procedure;

class ProcedureTable extends DataTableComponent
{
    protected $model = Procedure::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Typeprocedure id", "typeprocedure_id")
                ->sortable(),
            Column::make("Area id", "area_id")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Administrator id", "administrator_id")
                ->sortable(),
            Column::make("Date", "date")
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
