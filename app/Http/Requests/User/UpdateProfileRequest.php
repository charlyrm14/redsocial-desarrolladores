<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateProfileRequest extends FormRequest
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
            'username' => [
                    'required',
                    'unique:users,username,' . auth()->user()->id,
                    'min:3',
                    'max:20',
                    'not_in:edit-profile',
            ]
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
