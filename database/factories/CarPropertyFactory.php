<?php

namespace Database\Factories;

use App\Models\CarProperty;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarPropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarProperty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar'=>$this->faker->unique()->randomElement(["عام","خاص"]),
            'name_en'=>$this->faker->unique()->randomElement(["Public","Private",])
        ];
    }
}
