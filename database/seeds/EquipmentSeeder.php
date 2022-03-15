<?php

use Illuminate\Database\Seeder;
use App\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Equipment::class,15)->create();
    }
}
