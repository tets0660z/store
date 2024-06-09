<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random = rand(0,5);
        $randomImage = rand(0,59);
        $category = ['garments', "men s clothing", "women's clothing", 'electronics','jewelries','kitchen'];
        $xxx = $category[$random];
        return 
            [
                'title' => fake()->sentence(),
                'description' => fake()->text(500),
                'image' => "https://picsum.photos/id/{$randomImage}/600/600",
                'price' => fake()->biasedNumberBetween(10,10000),
                'count' => fake()->biasedNumberBetween(1, 1000),
                'rate' => fake()->numberBetween(0,5),
                'category' => $xxx,
            ];
       
    }
}
