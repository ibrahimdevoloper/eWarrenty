<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Battery;
use App\Models\CarProperty;
use App\Models\CarType;
use App\Models\Country;
use App\Models\ManufacturingCountry;
use App\Models\Market;
use App\Models\Religion;
use App\Models\Role;
use App\Models\Terminal;
use App\Models\Warranty;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');


        CarProperty::truncate();
        CarType::truncate();
        Country::truncate();
        ManufacturingCountry::truncate();
        Terminal::truncate();
        Battery::truncate();
        Warranty::truncate();
        Market::truncate();

        

        $carPropertyQuantty=2;
        $carTypeQuantty=3;
        $countryQuantty=3;
        $manufacturingCountryQuantty=3;
        $terminalQuantty=5;
        $batteryQuantty=10;
        $marketQuantty=250;
        $warrantyQuantty=10000;


        // for laravel 5.*
        // factory(Employees::class,$employeesQuantty)->create();
        // factory(Locations::class,$locationsQuantty)->create();
        // factory(Merchants::class,$merchantsQuantty)->create();
        // factory(Products::class,$productsQuantty)->create();
        // factory(Sells::class,$sellsQuantty)->create();
        // factory(Visits::class,$visitsQuantty)->create();

        //for laravel 8.*
        CarProperty::factory()->count($carPropertyQuantty)->create();
        CarType::factory()->count($carTypeQuantty)->create();
        Country::factory()->count($countryQuantty)->create();
        ManufacturingCountry::factory()->count($manufacturingCountryQuantty)->create();
        Terminal::factory()->count($terminalQuantty)->create();
        Battery::factory()->count($batteryQuantty)->create();
        Market::factory()->count($marketQuantty)->create();
        Warranty::factory()->count($warrantyQuantty)->create();
        


    }
}
