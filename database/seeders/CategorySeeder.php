<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'brand_name' => '1',
            'category_name' => 'Mobiles',
        ]);
        Category::create([
            'brand_name' => '1',
            'category_name' => 'Laptop',
        ]);
        Category::create([
            'brand_name' => '1',
            'category_name' => 'Pendrive',
        ]);
        Category::create([
            'brand_name' => '2',
            'category_name' => 'Desktop',
        ]);
        Category::create([
            'brand_name' => '3',
            'category_name' => 'Headphone',
        ]);
        Category::create([
            'brand_name' => '1',
            'category_name' => 'Smartwatch',
        ]);
    }
}
