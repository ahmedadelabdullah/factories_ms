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
                    'name' => 'El badr customer',
                    'owner' => 'El badr ',
                    'com_code' => 1008,
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'status' => 'active',
                ],
                
                [
                    'name' => 'Elmagd customer',
                    'owner' => 'Elmagd',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'com_code' => 1009,
                    'status' => 'active',
                ],

                
                [
                    'name' => 'Elhout',
                    'owner' => 'Elhout',
                    'com_code' => 1010,
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'status' => 'active',
             
                ],
                
                
                [
                    'name' => 'Ellourd',
                    'owner' => 'Elmagd',
                    'com_code' => 1009,
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'status' => 'active',
              
                ],
                
                
                [
                    'name' => 'Rodaina',
                    'owner' => 'Elmagd',
                    'com_code' => 1009,
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'status' => 'active',
                ]
                ]
            );
    }
}
