<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Shop;
use Database\Factories\ShopFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Shop::factory(10)->create();
        Product::factory(50)->create();

        foreach (Product::all() as $products) {
            $shops = Shop::inRandomOrder()->take(rand(1, 4))->pluck('id');
            foreach ($shops as $shop) {
                $products->shops()->attach($shop, ['available' => rand(0, 1)]);
            }
        }
    }
}
