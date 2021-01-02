<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar'=>$this->faker->unique()->randomElement(["سوريا","سودان","كندا"]),
            'name_en'=>$this->faker->unique()->randomElement(["Syria","Sudan","Canda"])
        ];
    }
}
