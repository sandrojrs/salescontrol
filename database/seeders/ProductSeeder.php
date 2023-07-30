<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::create([
            'name' => 'Camiseta polo',
            'price' => 250,
            'description' => 'Good watch',
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Short',
            'price' => 350,
            'description' => 'Good Bag',
            'category_id' => 1
        ]);
    }
}