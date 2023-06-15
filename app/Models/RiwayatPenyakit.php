<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    use HasFactory;

    public $table = 'riwayat_penyakit';

    public $fillable = [
        'user_id', 'penyakit'
    ];
}
