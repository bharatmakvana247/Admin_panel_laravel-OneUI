<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::create([
            'product_name' => 'Product 1',
            'product_details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'category_name' => '1',
            'brand_id' => '1',
            'product_price' => '25000',
            'product_qty' => '2',
            'product_image' => 'default.png',
        ]);

        Product::create([
            'product_name' => 'Product 2',
            'product_details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'category_name' => '1',
            'brand_id' => '1',
            'product_price' => '24000',
            'product_qty' => '2',
            'product_image' => 'default.png',
        ]);

        Product::create([
            'product_name' => 'Product 3',
            'product_details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'category_name' => '1',
            'brand_id' => '1',
            'product_price' => '25999',
            'product_qty' => '2',
            'product_image' => 'default.png',
        ]);
    }
}
