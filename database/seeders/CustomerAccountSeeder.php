<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomersAccount;

class CustomerAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomersAccount::insert(
            [
                [
                    'invoice_number' => 1001,
                    'customer_id' => 1,
                    'mark' => 0,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-01-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                [
                    'invoice_number' => 6001,
                    'customer_id' => 1,
                    'mark' => 1,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-01-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                [
                    'invoice_number' => 1002,
                    'customer_id' => 2,
                    'mark' => 0,
                    'n_o_pieces' => 50,
                    'n_o_models' => 1,
                    'date' => '2021-02-01',
                    'recipient' => 'سعد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                 [
                    'invoice_number' => 1003,
                    'customer_id' => 3,
                    'mark' => 0,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-03-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                [
                    'invoice_number' => 1004,
                    'customer_id' => 4,
                    'mark' => 0,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-04-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                [
                    'invoice_number' => 1005,
                    'customer_id' => 5,
                    'mark' => 0,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-05-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                [
                    'invoice_number' => 1006,
                    'customer_id' => 6,
                    'mark' => 0,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-06-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ],
                [
                    'invoice_number' => 1007,
                    'customer_id' =>7,
                    'mark' => 0,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-01-09',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 5000
                ] ,      


               
                [
                    'invoice_number' => 6002,
                    'customer_id' => 2,
                    'mark' => 1,
                    'n_o_pieces' => 50,
                    'n_o_models' => 1,
                    'date' => '2021-02-01',
                    'recipient' => 'سعد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 1570,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 0
                ],
                 [
                    'invoice_number' => 6003,
                    'customer_id' => 3,
                    'mark' => 1,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-03-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 1570,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 6004,
                    'customer_id' => 4,
                    'mark' => 1,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-04-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 1570,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 6005,
                    'customer_id' => 5,
                    'mark' => 1,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-05-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 10080,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 6006,
                    'customer_id' => 6,
                    'mark' => 1,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-06-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 5000,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 6007,
                    'customer_id' =>7,
                    'mark' => 1,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-01-09',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 100,
                    'sub_total' => 100,
                    'total_due_return' => 6720,
                    'total_due_payment' => 0,
                    'total_due_invoice' => 0
                ] ,  


                [
                    'invoice_number' => 9001,
                    'customer_id' => 1,
                    'mark' => 2,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-01-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 0,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 5000,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 9002,
                    'customer_id' => 2,
                    'mark' => 2,
                    'n_o_pieces' => 50,
                    'n_o_models' => 1,
                    'date' => '2021-02-01',
                    'recipient' => 'سعد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 0,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 10000,
                    'total_due_invoice' => 0
                ],
                 [
                    'invoice_number' => 9003,
                    'customer_id' => 3,
                    'mark' => 2,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-03-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 0,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 2500,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 9004,
                    'customer_id' => 4,
                    'mark' => 2,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-04-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 0,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 15000,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 9005,
                    'customer_id' => 5,
                    'mark' => 2,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-05-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 0,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 20000,
                    'total_due_invoice' => 0
                ],
                [
                    'invoice_number' => 9006,
                    'customer_id' => 6,
                    'mark' => 2,
                    'n_o_pieces' => 100,
                    'n_o_models' => 2,
                    'date' => '2021-06-01',
                    'recipient' => 'أحمد',
                    'sale_per_piece' => 5,
                    'sale_amount' => 0,
                    'discount' => 0,
                    'sub_total' => 100,
                    'total_due_return' => 0,
                    'total_due_payment' => 12000,
                    'total_due_invoice' => 0
                ],
              
       
            ]
        );
    }
}
