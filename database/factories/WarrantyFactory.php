<?php

namespace Database\Factories;

use App\Models\Battery;
use App\Models\CarProperty;
use App\Models\CarType;
use App\Models\Market;
use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarrantyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warranty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'battery_serial_number'=>substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10),
            'bought_date'=>$this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
            'car_number'=>substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,6),
            'car_number_image'=>$this->faker->randomElement([
                'images/carFront/1.png',
                'images/carFront/2.png',
                'images/carFront/3.png'
            ]),
            'battery_front_image'=>$this->faker->randomElement([
                'images/batteries/1.png',
                'images/batteries/2.png',
                'images/batteries/3.png'
            ]),
            'fixed_battery_image'=>'images/fixedCarBattery/1.jpg',
            'battery_model_id'=>Battery::all()->random()->id,
            'car_property_id'=>CarProperty::all()->random()->id,
            'car_type_id'=>CarType::all()->random()->id,
            "warranty_code"=>substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,7),
            "customer_phone_number"=>$this->faker->phoneNumber(),
            "customer_address"=>$this->faker->address(),
            "customer_country"=>$this->faker->country(),
            "customer_email"=>$this->faker->email(),
            "customer_name"=>$this->faker->name(),
            "notes"=>$this->faker->text(190),
            'market_id'=>Market::all()->random()->id,
        ];
    }
}
