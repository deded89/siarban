<?php

namespace App\Helpers;

class MyHelper
{
    public static function formatNumber($value)
    {
        return 'Rp ' . str_replace(',00', ',-', number_format($value, 2, ',', '.'));
    }

    public static function cekVar($value)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        die;
    }
}
