<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed'
        ];
    }

    public function validated()
    {
        $validatedData = parent::validated();
        return [
            'name' => data_get($validatedData, 'name'),
            'email' => data_get($validatedData, 'email'),
            'password' => bcrypt(data_get($validatedData, 'password')),
        ];
    }
}
