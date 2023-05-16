<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Index extends Component
{
    public function render()
    {
        $all = [
          'chart_title' => 'Trámites',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
          'chart_color' => '#2AD5CB',
        ];

        $unassigned = [
          'chart_title' => 'Sin asignar',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Sin asignar', 'condition' => 'state = 1', 'color' => '#C8B9CB', 'fill' => true],
          ],
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
        ];

        $assign = [
          'chart_title' => 'Asignado',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Asignado', 'condition' => 'state = 2', 'color' => '#B735D4', 'fill' => true],
          ],
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
        ];

        $observed = [
          'chart_title' => 'Observado',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Observado', 'condition' => 'state = 3', 'color' => '#D47835', 'fill' => true],
          ],
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
        ];

        $reviewed = [
          'chart_title' => 'Revisado',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Revisado', 'condition' => 'state = 4', 'color' => '#35B1C5', 'fill' => true],
          ],
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
        ];

        $approved = [
          'chart_title' => 'Aprovado',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Aprovado', 'condition' => 'state = 5', 'color' => '#5AC535', 'fill' => true],
          ],
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
        ];

        $refused = [
          'chart_title' => 'Rechazado',
          'chart_type' => 'line',
          'report_type' => 'group_by_date',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Rechazado', 'condition' => 'state = 6', 'color' => '#EC1A2D', 'fill' => true],
          ],
          'group_by_field' => 'created_at',
          'group_by_period' => 'day',
          'aggregate_function' => 'count',
          'filter_field'=> 'created_at',
          'filter_days' => '30',
          'group_by_field_format' => 'Y-m-d H:i:s',
          'entries_number' => '5',
          'translation_key'  => 'procedure',
          'aggregate_field' => 'trámites',
          'continuous_time' => true,
        ];

        $all2 = [
          'chart_title' => 'Trámites',
          'chart_type' => 'pie',
          'report_type' => 'group_by_string',
          'model' => 'App\Models\Procedure',
          'conditions' => [
            ['name' => 'Sin asignar', 'condition' => 'state = 1', 'color' => 'black', 'fill' => true],
            ['name' => 'Asignado', 'condition' => 'state = 2', 'color' => 'blue', 'fill' => true],
            ['name' => 'Observado', 'condition' => 'state = 3', 'color' => 'blue', 'fill' => true],
            ['name' => 'Revisado', 'condition' => 'state = 4', 'color' => 'blue', 'fill' => true],
          ],
          'group_by_field' => 'state',
          'filter_field' => 'created_at',
          'filter_period' => 'week'
        ];

        $chartprocedures = new LaravelChart($all, $unassigned, $assign, $observed, $reviewed, $approved, $refused);
        $chartprocedurespie = new LaravelChart($all2);

        return view('livewire.admin.index', compact('chartprocedures', 'chartprocedurespie'));
    }
}
