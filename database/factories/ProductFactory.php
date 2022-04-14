<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public $colors = ['red', 'green', 'blue', 'white'];

    public function definition()
    {

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text('200'),
            'price' => $this->faker->numberBetween(100, 5000),
            'color' => $this->colors[array_rand($this->colors)]
        ];
    }
}
