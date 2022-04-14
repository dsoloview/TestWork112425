<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $city = ['Moscow', 'Riga', 'Kostroma', 'Saratov'];
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'city' => $this->city[array_rand($this->city)],
            'address' => $this->faker->streetAddress(),
            'phone' => $this->faker->phoneNumber(),
            'site' => $this->faker->url(),
        ];
    }
}
