<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'keyword' => $this->faker->words(5, true),
            'user_id' => $this->faker->numberBetween(1, 10),
            'path'=> $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        ];
    }
}
