<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sales_return_detail;

class SalesReturnDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sales_return_detail::insert(
            [
                [
                    'sales_returns_id' => 1,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '6500',
                ],
                [
                    'sales_returns_id' => 1,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '6500',
                ],
                [
                    'sales_returns_id' => 2,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '6500',
                ],
                [
                    'sales_returns_id' => 2,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '6500',
                ],
            ]
        );
    }
}
