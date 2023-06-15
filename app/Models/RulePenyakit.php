<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulePenyakit extends Model
{
    use HasFactory;

    public $table = 'rule_penyakit';

    public $fillable = [
        'gejala_id', 'penyakit_id', 'nilai_mb', 'nilai_md', 'nilai_cf'
    ];

    public function penyakit()
    {
        return $this->hasOne(Penyakit::class, 'id', 'penyakit_id');
    }

    public function gejala()
    {
        return $this->hasOne(Gejala::class, 'id', 'gejala_id');
    }
}
