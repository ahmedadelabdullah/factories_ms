<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerInvoice>
 */
class CustomerInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_number' => fake()->randomDigit,
            'customer_id' => $this->faker->randomElement(Customer::all())['id'],
            'n_o_pieces' => fake()->randomDigit,
            'n_o_models' => fake()->randomDigit,
            'date' => fake()->date,
            'n_o_pieces' => fake()->randomDigit,
            'sub_total' => fake()->randomDigit,
        ];
    }
}
