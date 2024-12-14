<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Models\Pemeliharaan;
use App\Models\Perusahaan;
use App\Models\Trayek;
use App\Models\User;
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

        $totalKendaraan = Kendaraan::where('kendaraan_st', 1)->count();
        $totalPerusahaan = Perusahaan::where('active_st', 1)->count();
        $totalTrayek = Trayek::where('active_st', 1)->count();
        $totalUser = User::count();

        $kendaraanNonAktif = Kendaraan::where('kendaraan_st', '!=', 1)->count();
        $perusahaanNonAktif = Perusahaan::where('active_st', '!=', 1)->count();
        $trayekNonAktif = Trayek::where('active_st', '!=', 1)->count();

        $presentaseKendaraan = (($totalKendaraan - $kendaraanNonAktif) / Kendaraan::count()) * 100;
        $presentaseTrayek = (($totalTrayek - $trayekNonAktif) / Trayek::count()) * 100;
        $presentasePerusahaan = (($totalPerusahaan - $perusahaanNonAktif) / Perusahaan::count()) * 100;


        return view('livewire.dashboard', [
            'data' => $data,
            'totalKendaraan' => $totalKendaraan,
            'totalPerusahaan' => $totalPerusahaan,
            'totalTrayek' => $totalTrayek,
            'totalUser' => $totalUser,
            'presentaseKendaraan' => $presentaseKendaraan,
            'presentaseTrayek' => $presentaseTrayek,
            'presentasePerusahaan' => $presentasePerusahaan,
        ]);
    }
}
