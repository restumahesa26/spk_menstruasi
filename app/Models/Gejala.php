<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    public $table = 'gejala';

    public $fillable = [
        'nama', 'kode'
    ];

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class)->withPivot('value_cf');
    }
}
