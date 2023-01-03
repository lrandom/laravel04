<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'imageable_type' => $this->faker->randomElement([Post::class, Product::class]),
            'imageable_id' => $this->faker->numberBetween(1, 20),
            'path' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker')
        ];
    }
}
