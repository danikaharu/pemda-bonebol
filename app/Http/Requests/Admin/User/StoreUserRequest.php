<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => ['required', 'exists:roles,name'],
            'password' =>  [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username sudah digunakan silahkan pilih yang lain',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Diisi dengan alamat email yang valid',
            'email.unique' => 'Email sudah digunakan silahkan pilih yang lain',
            'role.required' => 'Role Wajib Diisi',
            'role.exists' => 'Role tidak ada dalam daftar',
            'password.required' => 'Password Wajib Diisi',
            'password.confirmed' => 'Password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ];
    }
}
