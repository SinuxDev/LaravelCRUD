<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $adddress = ['yangon','mandalay','bago','naypyitaw','hmawbi','Inn Lay'];
        return [
            'title' =>$this->faker->sentence(8),
            'description' => $this->faker->text(200),
            'price' => rand(2000,50000),
            'address' => $adddress[array_rand($adddress)],
            'rating' => rand(0,5),
        ];
    }
}
