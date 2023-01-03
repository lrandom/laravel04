<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagableFactory extends Factory
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
            'tagable_type' => $this->faker->randomElement([Post::class, Product::class]),
            'tagable_id' => $this->faker->numberBetween(1, 20),
            'tag_id'=> $this->faker->numberBetween(1, 5)
        ];
    }
}
