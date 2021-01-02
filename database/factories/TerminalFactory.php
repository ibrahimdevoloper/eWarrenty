<?php

namespace Database\Factories;

use App\Models\Terminal;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Terminal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>substr(str_shuffle('-+()0123456789'),1,5)
        ];
    }
}
