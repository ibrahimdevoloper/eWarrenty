<?php

namespace Database\Factories;

use App\Models\Battery;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Terminal;
use App\Models\ManufacturingCountry;

class BatteryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'number'=>substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5),
        'info_ar'=>$this->faker->paragraph(1),
        'info_en'=>$this->faker->paragraph(1),
        'capacity'=> random_int(30,110),
        'cca_ampere'=>random_int(250,1100),
        'weight'=>random_int(200,450)/10,
        'terminal_id'=>Terminal::all()->random()->id,
        'dimensions'=>substr(str_shuffle('0123456789***'),1,5),
        'description_en'=>$this->faker->paragraph(1),
        'description_ar'=>$this->faker->paragraph(1),
        'manufacturing_country_id'=>ManufacturingCountry::all()->random()->id,
        'image'=>$this->faker->randomElement([
            'images/batteries/1.png',
            'images/batteries/2.png',
            'images/batteries/3.png'
        ]),
        'serial_number_image'=>$this->faker->randomElement([
            'images/batteries/1.png',
            'images/batteries/2.png',
            'images/batteries/3.png'
        ]),
        'front_image'=>$this->faker->randomElement([
            'images/batteries/1.png',
            'images/batteries/2.png',
            'images/batteries/3.png'
        ]),
        
        ];
    }
}
