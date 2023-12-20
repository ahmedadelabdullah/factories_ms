<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomerInvoice;
class CustomerInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerInvoice::insert(
            [
                [
                    'invoice_number' => 1001,
                    'customer_id' => 2,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-01-01',
                    'recipient' => 'ahmed',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due' => 5000
                ],
                [
                    'invoice_number' => 1002,
                    'customer_id' => 1,
                    'n_o_pieces' => 50,
                    'n_o_models' => 1,
                    'date' => '2021-01-01',
                    'recipient' => 'saad',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due' => 5000
                ]
            ]
        );
    }
}
