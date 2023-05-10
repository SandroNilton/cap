<?php

namespace App\Http\Livewire\Admin\Categories;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateTimeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function filters(): array
    {
        return [
            DateTimeFilter::make('Creación desde')->filter(function(Builder $builder, string $value) { $builder->where('created_at', '>=', $value); }),
            DateTimeFilter::make('Creación a')->filter(function(Builder $builder, string $value) { $builder->where('created_at', '<=', $value); }),
            SelectFilter::make('Estado')
            ->setFilterPillTitle('Estado')
            ->setFilterPillValues(['1' => 'Activo', '0' => 'Inactivo',])
            ->options(['' => 'Todo', '1' => 'Activo', '0' => 'Inactivo',])
            ->filter(function(Builder $builder, string $value) {
              if ($value === '1') {
                  $builder->where('state', true);
              } elseif ($value === '0') {
                  $builder->where('state', false);
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
        Category::whereIn('id', $this->getSelected())->update(['state' => true]);
        $this->clearSelected();
    }

    public function deactivate()
    {
        Category::whereIn('id', $this->getSelected())->update(['state' => false]);
        $this->clearSelected();
    }

    public function export()
    {
      $categories = $this->getSelected();
      $this->clearSelected();
      return Excel::download(new CategoriesExport($categories), 'categorías.xlsx');
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
                  fn($row, Column $column) => view('admin.categories.actions')->withRow($row)
                ),
        ];
    }
}
