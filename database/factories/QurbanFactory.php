<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Qurban;
use Faker\Generator as Faker;

$factory->define(Qurban::class, function (Faker $faker) {
    $jenisQurban = array("1/7 Sapi Reguler", "1/7 Sapi Besar", "1/7 Kerbau", "1 Kambing", "1 Domba");
    $harga = range(2300000, 3000000, 500000);
    $besarAngsuran = range(20000, 30000, 1000);
    return [
        'jenis' => $jenisQurban[array_rand($jenisQurban)],
        'harga' => $harga[array_rand($harga)],
        'tahun' => $faker->numberBetween(1442, 1447),
        'lama' => $faker->numberBetween(1, 4),
        'besar_angsuran' => $besarAngsuran[array_rand($besarAngsuran)],
        'interval_angsuran' => $faker->numberBetween(7, 14),
        'tgl_angsuran_pertama' => $faker->dateTimeThisMonth,
        'max_pequrban' => $faker->randomNumber(1),
    ];
});
