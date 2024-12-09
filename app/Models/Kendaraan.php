<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
  use HasFactory;

  public $guarded = [];

  public function scopeCari($filter, $value)
  {
    if ($value) {
      return $this->where('no_kendaraan', 'like', "%$value%");
    }
  }

  public function perusahaan()
  {
    return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
  }

  public function trayek()
  {
    return $this->belongsTo(Trayek::class, 'trayek_id');
  }




}
