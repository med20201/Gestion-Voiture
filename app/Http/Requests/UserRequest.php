<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            // 'email' => ['required',
            //     Rule::unique('users')->ignore($this->user)],
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required',
            'ville' => 'required'
        ];
    }
    public function messages()
    {
         return [
            "name.required"=>"Le  Nom est obligatoire",
            "email.required"=>"Email est obligatoire",
            "password.required"=>"Le motpasse est obligatoire",
            "password.confirmed"=>"Le motpasse diffrent",
            "password.min"=>"caractere password 8 minimale",
            "phone.required"=>"Le phone est obligatoire ",
            "ville.required"=>"La viile est obligatoire ",
  

        ];
    }
}
