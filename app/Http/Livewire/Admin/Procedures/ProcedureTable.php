<?php

namespace App\Http\Livewire\Admin\Procedures;

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
use App\Models\Procedure;
use App\Models\Procedurehistory;

class ProcedureTable extends DataTableComponent
{
    protected $model = Procedure::class;

    public function filters(): array
    {
        return [
            DateTimeFilter::make('Creación desde')->filter(function(Builder $builder, string $value) { $builder->where('procedures.created_at', '>=', $value); }),
            DateTimeFilter::make('Creación a')->filter(function(Builder $builder, string $value) { $builder->where('procedures.created_at', '<=', $value); }),
            SelectFilter::make('Estado')
            ->setFilterPillTitle('Estado')
            ->setFilterPillValues(['1' => 'Sin asignar', '2' => 'Asignado', '3' => 'Observado', '4' => 'Revisado', '5' => 'Aprobado', '6' => 'Rechazado'])
            ->options(['' => 'Todo', '1' => 'Sin asignar', '2' => 'Asignado', '3' => 'Observado', '4' => 'Revisado', '5' => 'Aprobado', '6' => 'Rechazado'])
            ->filter(function(Builder $builder, string $value) {
              if ($value === '1') {
                  $builder->where('procedures.state', 1);
              } 
              elseif ($value === '2') {
                  $builder->where('procedures.state', 2);
              }
              elseif ($value === '3') {
                  $builder->where('procedures.state', 3);
              }
              elseif ($value === '4') {
                  $builder->where('procedures.state', 4);
              }
              elseif ($value === '5') {
                  $builder->where('procedures.state', 5);
              }
              elseif ($value === '6') {
                $builder->where('procedures.state', 6);
            }
            }),
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function assignme($id)
    {
        $unassigned_procedure  = Procedure::where([['id', '=', $id], [ 'administrator_id', '=', NULL]])->get();
        
        if($unassigned_procedure->count() > 0) {
          Procedure::where('id', $unassigned_procedure[0]->id)->update(['administrator_id' => auth()->user()->id], ['state' => 2]);
          Procedurehistory::create([
            'procedure_id' => $unassigned_procedure[0]->id,
            'typeprocedure_id' => $unassigned_procedure[0]->typeprocedure_id,
            'area_id' => $unassigned_procedure[0]->area_id,
            'user_id' => $unassigned_procedure[0]->user_id,
            'administrator_id' => auth()->user()->id,
            'description' => $unassigned_procedure[0]->description,
            'action' => 'Tomar tramite',
            'state' => 2
          ]);
          $this->notice('Se autoasigno el trámite correctamente', 'alert');
        } else {
          $this->notice('El trámite ya cuenta con un usuario', 'alert');
        }
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")
                ->sortable()
                ->searchable(),
            Column::make("Codigo", "user.code")
                ->sortable()
                ->searchable(),
            Column::make("Cliente", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Tipo de trámite", "typeprocedure.name")
                ->sortable()
                ->searchable(),
            Column::make("Área", "area.name")
                ->sortable()
                ->searchable(),
            Column::make('Usuario', 'administrator_id')
                ->format(
                  fn($value, $row, Column $column) => view('admin.procedures.assign')->withRow($row)->withValue($value)
                ),
            Column::make("Estado", "state")
                ->format(
                  fn($value, $row, Column $column) => view('admin.procedures.state')->withValue($value)
                ),
            Column::make("Fecha de creación", "created_at")
                ->sortable()
                ->format(
                  fn($value, $row, Column $column) => ''.$row->created_at->format('d/m/Y H:i').''
                )
                ->html(),
            Column::make('Acciones')
                ->label(
                  fn($row, Column $column) => view('admin.procedures.actions')->withRow($row)
                ),
        ];
    }

    public function builder(): Builder
    {
        if(auth()->user()->hasRole('admin')) {
          return Procedure::query()->orderBy('created_at', 'desc');
        } else {
          return Procedure::query()->where('area_id', '=', auth()->user()->area_id)->where('is_admin', '=', 1)->orderBy('created_at', 'desc');
        }
    }
}
