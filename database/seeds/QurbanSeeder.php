<?php

use Illuminate\Database\Seeder;

class QurbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Qurban::class, 4)->create()->each(function ($qurban) {
            $slot = new App\Slot(['user_id' => App\User::all()->random(1)->first()->id]);
            $qurban->slots()->save($slot);
        });

        App\Slot::all()->each(function ($slot) {
            $besar_angsuran = $slot->qurban->besar_angsuran;
            for ($i = 0; $i < 10; $i++) {
                $angsuran = new App\Angsuran(['jumlah' => $besar_angsuran]);
                $slot->angsurans()->save($angsuran);
            }
        });
    }
}
