<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert(
            [
                [
                    'name' => 'مكتب اسطورة',
                    'com_code' => 1008,
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'start_balance' => 30000,
                    'current_balance' => 145625,
                    'status' => 'active',
                ],
                
                [
                    'name' => 'مكتب المجد',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'start_balance' => 39000,
                    'current_balance' => 144425,
                    'com_code' => 1009,
                    'status' => 'active',
                ],

                
                [
                    'name' => 'مكتب الحوت',
                    'com_code' => 1010,
                    'phone' => '01081909342',
                    'start_balance' => 45000,
                    'current_balance' => 255625,
                    'address' => 'cairo',
                    'status' => 'active',
             
                ],
                
                
                [
                    'name' => 'مكتب اللورد',
                    'com_code' => 1009,
                    'phone' => '01081909342',
                    'start_balance' => 97000,
                    'current_balance' => 255625,
                    'address' => 'cairo',
                    'status' => 'active',
              
                ],
                
                
                [
                    'name' => 'مكتب رودينا',
                    'com_code' => 1009,
                    'phone' => '01081909342',
                    'start_balance' => 12500,
                    'current_balance' => 845625,
                    'address' => 'cairo',
                    'status' => 'active',
                ],
                
                
                [
                    'name' => 'مكتب الشيخ',
                    'com_code' => 1009,
                    'phone' => '01081909342',
                    'start_balance' => 12500,
                    'current_balance' => 845625,
                    'address' => 'cairo',
                    'status' => 'active',
                ],
                
                
                [
                    'name' => 'مكتب سعودي',
                    'com_code' => 1009,
                    'phone' => '01081909342',
                    'start_balance' => 12500,
                    'current_balance' => 845625,
                    'address' => 'cairo',
                    'status' => 'active',
                ]
                ]
            );
    }
}
