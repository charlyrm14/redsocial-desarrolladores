<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SignUpRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
    */
    protected function prepareForValidation()
    {
        $this->merge([
            'username' => Str::slug( $this->username ),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'required|max:30',
            'username'  => 'required|unique:users|min:3|max:20',
            'email'     => 'required|unique:users|email|max:60',
            'password'  => 'required|confirmed|min:6'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'username.required' => 'El campo usuario es obligatorio',
            'username.unique'   => 'El nombre de usuario ya está en uso',
        ];
    }
}
