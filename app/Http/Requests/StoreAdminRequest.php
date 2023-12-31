<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'name' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password' => 'الرقم السري مطلوب',
            'password_confirmation' => 'الرقم السري مطلوب',
            'name' => 'اسم المستخدم مطلوب',
            'user_name' => 'اسم المستخدم مطلوب',
            'phone' => 'رقم الموبايل مطلوب',
        ];
    }
}
