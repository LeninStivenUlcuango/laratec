<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Route;


class EditRequest extends FormRequest
{
    protected $route;

    public function __construct(Route $route)
    {
        $this->route=$route;
    }
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
            'id_number' => ['required','numeric',Rule::unique("customers")->ignore($this->route->parameter('cliente')),'max_digits:10'],
            'email' => ['required',Rule::unique("customers")->ignore($this->route->parameter('cliente')),'email:filter'],
            'addres' => 'required',
            'phone' => 'required|numeric|max_digits:13',
        ];
    }
}
