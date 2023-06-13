<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrationRequest extends FormRequest
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
            'email' => 'required| email| unique:users',
            'name' => 'required| unique:users| max: 125',
            'avatar' => 'required| image',
            'region' => 'required',
            'password' => 'required| min: 8',
            'password_confirm' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'E-mail был введён некорректно',
            'email.unique' => 'Этот E-mail уже занят',
            'name.unique' => 'Это имя уже занято',
            'nikname.max' => 'Имя не должно превышать 125 символов',
            'password.min' => 'Пароль должен быть не менее 8 символов',
            'avatar.mimes' => 'Загружать можно только в форматах jpeg, png, jpg',
            'password_confirm.same' => 'Пароли не совпадают',
            '*.required' => 'Пожалуйста, заполните это поле'
        ];
    }
}
