<?php

namespace Database\Factories;

use App\Models\MeterData;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeterDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MeterData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'device_id' => $this->faker->randomDigitNotNull,
        'cf1' => $this->faker->randomDigitNotNull,
        'cf2' => $this->faker->randomDigitNotNull,
        'cf3' => $this->faker->randomDigitNotNull,
        'cf4' => $this->faker->randomDigitNotNull,
        'cf5' => $this->faker->randomDigitNotNull,
        'cf6' => $this->faker->randomDigitNotNull,
        'cf7' => $this->faker->randomDigitNotNull,
        'cf8' => $this->faker->randomDigitNotNull,
        'cf9' => $this->faker->randomDigitNotNull,
        'cf10' => $this->faker->randomDigitNotNull,
        'cf11' => $this->faker->randomDigitNotNull,
        'cf12' => $this->faker->randomDigitNotNull,
        'cf13' => $this->faker->randomDigitNotNull,
        'cf14' => $this->faker->randomDigitNotNull,
        'cf15' => $this->faker->randomDigitNotNull,
        'cf16' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
