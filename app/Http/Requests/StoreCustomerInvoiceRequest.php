<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'invoice_number' => 'required',
            // 'date' => 'required',
            // 'n_o_pieces' => 'required',
            // 'customer' => 'required',

            // 'quantity' => 'required|array',
            // 'quantity.*' => 'required',

            // 'price' => 'required|array',
            // 'price.*' => 'required',
        ];
    }
}
