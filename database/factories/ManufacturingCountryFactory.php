<?php

namespace Database\Factories;

use App\Models\ManufacturingCountry;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturingCountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ManufacturingCountry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar'=>$this->faker->unique()->randomElement(["الهند","كوريا","مصر"]),
            'name_en'=>$this->faker->unique()->randomElement(["India","Korea","Eygpt"])
        ];
    }
}
