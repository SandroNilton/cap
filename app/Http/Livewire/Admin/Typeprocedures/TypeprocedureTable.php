<?php

namespace App\Http\Livewire\Admin\Typeprocedures;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateTimeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\TypeproceduresExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Typeprocedure;

class TypeprocedureTable extends DataTableComponent
{
    protected $model = Typeprocedure::class;

    public function filters(): array
    {
        return [
            DateTimeFilter::make('Creación desde')->filter(function(Builder $builder, string $value) { $builder->where('typeprocedures.created_at', '>=', $value); }),
            DateTimeFilter::make('Creación a')->filter(function(Builder $builder, string $value) { $builder->where('typeprocedures.created_at', '<=', $value); }),
            SelectFilter::make('Estado')
            ->setFilterPillTitle('Estado')
            ->setFilterPillValues(['1' => 'Activo', '0' => 'Inactivo',])
            ->options(['' => 'Todo', '1' => 'Activo', '0' => 'Inactivo',])
            ->filter(function(Builder $builder, string $value) {
              if ($value === '1') {
                  $builder->where('typeprocedures.state', true);
              } elseif ($value === '0') {
                  $builder->where('typeprocedures.state', false);
              }
            }),
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setHideBulkActionsWhenEmptyStatus(true);
        $this->setBulkActions([
          'exportSelected' => 'Export',
        ]);
        $this->setBulkActionsEnabled();
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
            'export' => 'Exportar',
        ];
    }

    public function activate()
    {
        Typeprocedure::whereIn('id', $this->getSelected())->update(['state' => true]);
        $this->clearSelected();
    }

    public function deactivate()
    {
        Typeprocedure::whereIn('id', $this->getSelected())->update(['state' => false]);
        $this->clearSelected();
    }

    public function export()
    {
      $typeprocedures = $this->getSelected();
      $this->clearSelected();
      return Excel::download(new TypeproceduresExport($typeprocedures), 'tiposdetramites.xlsx');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Descripción", "description")
                ->sortable()
                ->format(
                  fn($value, $row, Column $column) => ''. (!empty($row->description)) ? $row->description : '--' .''
                ),
            Column::make("Área", "area.name")
                ->sortable()
                ->searchable(),
            Column::make("Categoría", "category.name")
                ->sortable()
                ->searchable(),
            Column::make("Price", "price")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Estado", "state")
                ->sortable(),
            Column::make("Fecha de creación", "created_at")
                ->sortable()
                ->format(
                  fn($value, $row, Column $column) => ''.$row->created_at->format('d/m/Y H:i').''
                )
                ->html(),
            Column::make('Acciones')
                ->label(
                  fn($row, Column $column) => view('admin.typeprocedures.actions')->withRow($row)
                ),
        ];
    }

    public function builder(): Builder
    {
        return Typeprocedure::query()->orderBy('created_at', 'desc');
    }
}
