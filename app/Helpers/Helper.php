<?php

namespace App\Helpers;

use App\Models\Penyakit;

class Helper
{
    public static function penyakit()
    {
        $items = Penyakit::orderBy('nama', 'ASC')->get();

        return $items;
    }
}
