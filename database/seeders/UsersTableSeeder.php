<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        User::insert(
            [
                [
                    'name' => 'super admin',
                    'user_name' => 'super_admin',
                    'com_code' => '0',
                    'email' => 'ahmed.git@yahoo.com',
                    'phone' => '01016070906',
                    'address' => 'cairo',
                    'role' => 'admin',
                    'status' => 'active',
                    'password' => Hash::make('xxXX202033@@@'),
                    'remember_Token' => Str::random(60)
                ],
                [
                    'name' => 'admin',
                    'user_name' => 'admin',
                    'com_code' => '1',
                    'email' => 'admin@yahoo.com',
                    'phone' => '01278154024',
                    'address' => 'cairo',
                    'role' => 'admin',
                    'status' => 'active',
                    'password' => Hash::make('xxXX202033@@@'),
                    'remember_Token' => Str::random(60)

                ],
                [
                    'name' => 'hussein owner',
                    'user_name' => 'hussein_owner',
                    'com_code' => 1001,
                    'email' => 'hussein@yahoo.com',
                    'phone' => '01278154024',
                    'address' => 'cairo',
                    'role' => 'owner',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ]
                ,
                [
                    'name' => 'Eid Ahmed owner',
                    'user_name' => 'Ahla ekhtiar',
                    'com_code' => 1002,
                    'email' => 'eid@yahoo.com',
                    'phone' => '01281909342',
                    'address' => 'cairo',
                    'role' => 'owner',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                [
                    'name' => 'Mohamed Eltourky owner',
                    'user_name' => 'Eltourky',
                    'com_code' => 1003,
                    'email' => 'Eltourky@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'owner',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                [
                    'name' => 'Ahmed Adel Accountant',
                    'user_name' => 'Ahmed Adel',
                    'com_code' => 1004,
                    'email' => 'ahmed.git1@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'accountant',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                [
                    'name' => 'Gomaa accountant',
                    'user_name' => 'Gomaa',
                    'com_code' => 1005,
                    'email' => 'Gomaa@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'accountant',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                
                [
                    'name' => 'Khaled Elmasry supplier',
                    'user_name' => 'Elmasry',
                    'com_code' => 1006,
                    'email' => 'Elmasry@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'supplier',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                [
                    'name' => 'Khaled Taye3 supplier',
                    'user_name' => 'Taye3',
                    'com_code' => 1007,
                    'email' => 'Taye3@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'supplier',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                [
                    'name' => 'El badr customer',
                    'user_name' => 'badr',
                    'com_code' => 1008,
                    'email' => 'badr@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'customer',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ],
                
                [
                    'name' => 'Elmagd customer',
                    'user_name' => 'Elmagd',
                    'com_code' => 1009,
                    'email' => 'Elmagd@yahoo.com',
                    'phone' => '01081909342',
                    'address' => 'cairo',
                    'role' => 'customer',
                    'status' => 'active',
                    'password' => Hash::make('123'),
                    'remember_Token' => Str::random(60)
                ]
                
                ]
         
        );
    }
}
