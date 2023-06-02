<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|min:2|max:100',    
            'email' => [
                'required',
                'email',
                Rule::unique('customers')->ignore($this->id),
            ]
        ];
    }
}
