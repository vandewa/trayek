<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Pemeliharaan;
use App\Models\Trayek;
use Livewire\Component;

class Dashboard extends Component
{

    public $startDate;
    public $endDate;

    public function mount()
    {
        // 
    }

    public function updated($property)
    {
        // 
    }


    public function render()
    {
        $data = Trayek::with(['sk.pengawasan'])
            ->withCount([
                'sk as pengawasan_count' => function ($query) {
                    $query->whereHas('pengawasan', function ($a) {
                        if ($this->startDate && $this->endDate) {
                            $a->whereDate('created_at', '>=', $this->startDate)
                                ->whereDate('created_at', '<=', $this->endDate);
                        }
                    });
                },
                'sk as sk_count' => function ($query) {
                    if ($this->startDate && $this->endDate) {
                        $query->whereDate('created_at', '>=', $this->startDate)
                            ->whereDate('created_at', '<=', $this->endDate);
                    }
                }
            ])
            ->get();


        return view('livewire.dashboard', [
            'data' => $data
        ]);
    }
}
