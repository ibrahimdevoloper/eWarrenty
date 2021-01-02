<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Market;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class MarketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Market::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $fakerAr = Faker::create('ar_JO');
        static $password; 
        return [
        // 'name_ar'=>$fakerAr->text(25),
        'name_ar'=>$this->faker->text(25),
        'name_en'=>$this->faker->text(25),
        'email'=>$this->faker->email(),
        'address'=>$this->faker->address(),
        'country_id'=>Country::all()->random()->id,
        'phone_number'=>$this->faker->phoneNumber(),
        'username'=>$this->faker->userName(),
        'password'=>$password?:$password=bcrypt("123456")
        ];
    }
}
