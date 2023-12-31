<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerInvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerInvoiceDetail::insert(
            [
                [
                    'customers_account_id' => 1,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 1,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 2,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 2,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 3,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 4,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 5,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 6,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 7,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 8,
                    'product_name' => 'منتج 1',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 9,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
                [
                    'customers_account_id' => 5,
                    'product_name' => 'منتج 2',
                    'price' => 300,
                    'quantity' => 2,
                    'row_sub_total' => '2021-01-01',
                ],
            ]
        );
    }
}
