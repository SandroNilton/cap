<?php

namespace App\Http\Livewire\Admin;

use App\Models\Procedure as Procedures;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class Index extends Component
{
    public $state = [1, 2, 3, 4, 5, 6];

    public $colors = [1 => '#f6ad55', 2 => '#fc8181', 3 => '#90cdf4', 4 => '#66DA26', 5 => '#cbd5e0', 6 => '#66DA26'];

    public $firstRun = true;
    public $showDataLabels = false;

    protected $listeners = [
      'onPointClick' => 'handleOnPointClick',
      'onSliceClick' => 'handleOnSliceClick',
      'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function render()
    {
        $procedures = Procedures::whereIn('state', $this->state)->get();

        $columnChartModel = $procedures->groupBy('state')->reduce(function ($columnChartModel, $data) {
          $state = $data->first()->state;
          $value = $data->sum('state');
          return $columnChartModel->addColumn($state, $value, $this->colors[$state]);
        }, LivewireCharts::columnChartModel()
          ->setTitle('Trámites')
          ->setAnimated($this->firstRun)
          ->withOnColumnClickEventName('onColumnClick')
          ->setLegendVisibility(false)
          ->setDataLabelsEnabled($this->showDataLabels)
          ->setColumnWidth(90)
          ->withGrid()
        );

        $this->firstRun = false;

        return view('livewire.admin.index')->with(['columnChartModel' => $columnChartModel]);
    }
}
