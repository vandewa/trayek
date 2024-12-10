<?php

namespace App\Livewire\Chart;

use Livewire\Component;
use App\Models\Kendaraan;
use App\Livewire\Chart\KegiatanChart;
use App\Models\Trayek;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class SkChart extends Component
{
    public $startDate, $endDate;
    public function render()
    {

        $jingan = Trayek::withCount([
            'sk' => function ($a) {
                if ($this->startDate && $this->endDate) {
                    $a->where('created_at', '>=', $this->startDate)->where('created_at', '<=', $this->endDate);
                }
            }
        ])->get();

        // dd($jingan);
        $columnChartModel = $jingan
            ->reduce(
                function ($columnChartModel, $data) {
                    $type = $data->nama;
                    $value = $data->sk_count;


                    return $columnChartModel->addColumn($type, $value, '#fff');
                },
                LivewireCharts::columnChartModel()
                    ->setTitle('Jumlah')
                    ->setAnimated(true)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility(false)
                    ->setDataLabelsEnabled(true)
                    //->setOpacity(0.25)
                    // ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                    ->setColumnWidth(90)
                    ->withGrid()
            );


        return view('livewire.chart.sk-chart', [
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
