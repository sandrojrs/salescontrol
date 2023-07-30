<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'name' => 'Camiseta',
                'description' => 'moda masculina',
                'img' => 'Good watch',
                'active' => 1
            ],
            [
                'name' => 'Camiseta',
                'description' => 'moda masculina',
                'img' => 'Good watch',
                'active' => 1
            ]
        );
    }
}
