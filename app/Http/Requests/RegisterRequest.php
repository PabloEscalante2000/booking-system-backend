<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "data.attributes.name" => ["required", "string", "max:255"],
            "data.attributes.email" => ["required", "email", "max:255", "unique:users,email"],
            "data.attributes.password" => ["required", "string", "min:8", "confirmed"],
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            "name" => $this->input("data.attributes.name"),
            "email" => $this->input("data.attributes.email"),
            "password" => $this->input("data.attributes.password") 
        ];
    }
}
