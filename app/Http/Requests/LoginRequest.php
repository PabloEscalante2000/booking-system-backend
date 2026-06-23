<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            "data.attributes.email" => "required|string|email",
            "data.attributes.password" => "required|string|min:3|max:50"
        ];
    }

    public function authenticate()
    {
        $data = [
            "email" => $this->input("data.attributes.email"),
            "password" => $this->input("data.attributes.password")
        ];

        if(! Auth::attempt($data)){
            throw ValidationException::withMessages([
                "message" => "Las credenciales no son correctas"
            ]);
        }
    }
}
