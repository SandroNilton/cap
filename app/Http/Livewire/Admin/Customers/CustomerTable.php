<?php

namespace App\Http\Livewire\Admin\Customers;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateTimeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Exports\AreasExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Notifications\Notification;
use App\Models\User;

class CustomerTable extends DataTableComponent
{
    protected $model = User::class;

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
            SelectFilter::make('Tipo')
            ->setFilterPillTitle('Tipo')
            ->setFilterPillValues(['1' => 'Natural', '2' => 'Jurídica', '3' => 'Agremiada'])
            ->options(['' => 'Todo', '1' => 'Natural', '2' => 'Jurídica', '3' => 'Agremiada'])
            ->filter(function(Builder $builder, string $value) {
              if ($value === '1') {
                  $builder->where('type', 1);
              } elseif ($value === '2') {
                  $builder->where('type', 2);
              } elseif ($value === '3') {
                  $builder->where('type', 3);
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
        Notification::make()->success()->title('Se activó correctamente')->send(); 
        User::whereIn('id', $this->getSelected())->update(['state' => true]);
        $this->clearSelected();
    }

    public function deactivate()
    {
        Notification::make()->danger()->title('Se desactivó correctamente')->send(); 
        User::whereIn('id', $this->getSelected())->update(['state' => false]);
        $this->clearSelected();
    }

    public function export()
    {
      $customers = $this->getSelected();
      $this->clearSelected();
      return Excel::download(new CustomersExport($customers), 'clientes.xlsx');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")
                ->sortable(),
            Column::make("Tipo", "type")
                ->format(
                  fn($value, $row, Column $column) => view('admin.customers.type')->withValue($value)
              ),
            Column::make("Codigo", "code")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Correo", "email")
                ->sortable(),
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
                  fn($row, Column $column) => view('admin.customers.actions')->withRow($row)
                ),
        ];
    }

    public function builder(): Builder
    {
        return User::query()->where('type', '!=', 10)->where('is_admin', '!=', 1)->orderBy('created_at', 'desc');
    }
}
