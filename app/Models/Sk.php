<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;

    protected $table = 'sk';
    protected $guarded = []; // Tidak ada kolom yang dijaga

    protected $casts = [
        'tanggal_sk' => 'date',
        'tanggal_mulai_berlaku' => 'date',
        'tanggal_selesai_berlaku' => 'date',
    ];


    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function trayek()
    {
        return $this->belongsTo(Trayek::class, 'trayek_id');
    }

    public function skKendaraan()  {
        return $this->hasMany(SkKendaraan::class, 'sk_id');
    }

    public function kendaraans()
    {
        return $this->belongsToMany(Kendaraan::class, 'sk_kendaraans', 'sk_id', 'kendaraan_id');
    }
}
