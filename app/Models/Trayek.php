<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trayek extends Model
{
    use HasFactory;
    protected $guarded = []; // Tidak ada kolom yang dijaga

    public function sk()
    {
        return $this->hasMany(Sk::class, 'trayek_id'); // Sesuaikan foreign key jika berbeda
    }
}
