<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            $this->call(UsersTableSeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(CustomerSeeder::class);
            $this->call(CustomerInvoiceSeeder::class);
            // $this->call(CustomerInvoiceDetailSeeder::class);

        \App\Models\User::factory(20)->create();
        \App\Models\CustomerInvoiceDetail::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
