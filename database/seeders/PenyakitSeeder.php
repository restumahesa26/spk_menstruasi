<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penyakit::create([
            'kode' => 'P1',
            'nama' => 'Polyp'
        ]);

        Penyakit::create([
            'kode' => 'P2',
            'nama' => 'Adenomyosis'
        ]);

        Penyakit::create([
            'kode' => 'P3',
            'nama' => 'Leimyoma '
        ]);

        Penyakit::create([
            'kode' => 'P4',
            'nama' => 'Malignancy and hiperlasia'
        ]);

        Penyakit::create([
            'kode' => 'P5',
            'nama' => 'Coagulopathy'
        ]);

        Penyakit::create([
            'kode' => 'P6',
            'nama' => 'Ovulatory Disfunction'
        ]);

        Penyakit::create([
            'kode' => 'P7',
            'nama' => 'Endometrial'
        ]);

        Penyakit::create([
            'kode' => 'P8',
            'nama' => 'Amonorea'
        ]);

        Penyakit::create([
            'kode' => 'P9',
            'nama' => 'Dismenorea'
        ]);

        Penyakit::create([
            'kode' => 'P10',
            'nama' => 'Menorrahagia'
        ]);

        Penyakit::create([
            'kode' => 'P11',
            'nama' => 'Oligonomorea'
        ]);

        Penyakit::create([
            'kode' => 'P12',
            'nama' => 'Premenstrual Dysphoric Disorder'
        ]);
    }
}
