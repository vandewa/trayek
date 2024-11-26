<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    use HasFactory;

    protected $table = 'sk';
    protected $guarded = []; // Tidak ada kolom yang dijaga

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function trayek()
    {
        return $this->belongsTo(Trayek::class, 'trayek_id');
    }
}
