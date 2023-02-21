<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'brand_name' => 'Samsung',
        ]);
        Brand::create([
            'brand_name' => 'Iphone',
        ]);
        Brand::create([
            'brand_name' => 'Nokia',
        ]);
        Brand::create([
            'brand_name' => 'Vivo',
        ]);
        Brand::create([
            'brand_name' => 'Dell',
        ]);
    }
}
