<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\WarrantyDuration;

class WarrantyDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=UserSeeder

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        WarrantyDuration::truncate();
        $carPropertyQuantty=2;
        $batteryQuantty=10;
        WarrantyDuration::factory()->count($carPropertyQuantty*$batteryQuantty)->create();
    }
}
