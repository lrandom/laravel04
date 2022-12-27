<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExtraInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 3,
            'extra_address' => $this->faker->address,
            'extra_phone' => $this->faker->phoneNumber,
        ];
    }
}
