<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CustomerInvoice;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerInvoiceDetail>
 */
class CustomerInvoiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_invoice_id' =>  $this->faker->randomElement(CustomerInvoice::all())['id'],
            'product_name' => $this->faker->randomElement(Product::all())['product_name'],
            'price' => fake()->randomDigit,
            'quantity' => fake()->randomDigit,
            'row_sub_total' => fake()->randomDigit,

        ];
    }
}
