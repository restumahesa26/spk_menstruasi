<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    use HasFactory;

    public $table = 'riwayat_diagnosa';

    public $fillable = [
        'nama', 'hasil_diagnosa', 'cf_max', 'gejala_terpilih', 'file_pdf', 'user_id',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
