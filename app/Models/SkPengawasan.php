<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkPengawasan extends Model
{
    use HasFactory;

    protected $guarded = []; // Tidak ada kolom yang dijaga

    public function sk() {
        return $this->belongsTo(Sk::class, 'sk_id');
    }
}
