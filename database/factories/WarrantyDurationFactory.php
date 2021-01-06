<?php

namespace Database\Factories;

use App\Models\Battery; 
use App\Models\CarProperty;

use App\Models\WarrantyDuration;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarrantyDurationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WarrantyDuration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'battery_id'=>Battery::all()->random()->id,
            'car_property_id'=>CarProperty::all()->random()->id,
            'duration'=>rand(6,24),
        ];
    }
}
