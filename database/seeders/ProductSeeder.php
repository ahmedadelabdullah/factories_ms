<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert(
            [      [
                'product_name' => 'product 1',
                'product_price' => '100',
                
            ],
            [
                'product_name' => 'product 2',
                'product_price' => '200'
            ],
            [
                'product_name' => 'product 3',
                'product_price' => '300'
            ],
            [
                'product_name' => 'product 4',
                'product_price' => '400'
            ],
            [
                'product_name' => 'product 5',
                'product_price' => '500'
            ],
            [
                'product_name' => 'product 6',
                'product_price' => '600'
            ],
            [
                'product_name' => 'product 7',
                'product_price' => '700'
            ],
            [
            'product_name' => 'product 8',
            'product_price' => '800'
            ]]
        );
    }
}
