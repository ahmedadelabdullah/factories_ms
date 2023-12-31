<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            Payment::insert(
                [
                    [
                        'invoice_number' => 5455,
                        'customer_id' => 1,
                        'total_due_payment' => 15000,
                        'date' => '2021-01-02',
              
                    ],
                    [
                        'invoice_number' => 5454,
                        'customer_id' => 2,
                        'total_due_payment' => 10000,
                        'date' => '2021-01-03',
                    ],
                    [
                        'invoice_number' => 2455,
                        'customer_id' => 3,
                        'total_due_payment' => 5000,
                        'date' => '2021-01-06',
                    ],
                    [
                        'invoice_number' => 5465,
                        'customer_id' => 4,
                        'total_due_payment' => 4000,
                        'date' => '2021-01-07',
                    ],
                    [
                        'invoice_number' => 5451,
                        'customer_id' => 5,
                        'total_due_payment' => 3000,
                        'date' => '2021-01-08',
                    ],
                    [
                        'invoice_number' => 5855,
                        'customer_id' => 6,
                        'total_due_payment' => 20000,
                        'date' => '2021-01-09',
                    ],
                    [
                        'invoice_number' => 5855,
                        'customer_id' => 6,
                        'total_due_payment' => 10000,
                        'date' => '2021-01-09',
                    ],
                    [
                        'invoice_number' => 5855,
                        'customer_id' => 6,
                        'total_due_payment' => 5000,
                        'date' => '2021-01-09',
                    ],
                    [
                        'invoice_number' => 5450,
                        'customer_id' => 7,
                        'total_due_payment' => 8000,
                        'date' => '2021-01-15',
                    ]
                ]
            );
        }
    }
}
