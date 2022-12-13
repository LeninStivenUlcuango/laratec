<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'id_number' => 'required|numeric|unique:customers|max_digits:10',
            'email' => 'required|email:filter|unique:customers',
            'addres' => 'required',
            'phone' => 'required|numeric|max_digits:13',
        ];
    }
}