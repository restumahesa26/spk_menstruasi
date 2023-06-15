<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    public $table = 'penyakit';

    public $fillable = [
        'nama', 'kode', 'pencegahan', 'pengobatan'
    ];

    public function rule()
    {
        return $this->hasMany(RulePenyakit::class, 'penyakit_id', 'id');
    }
}
