<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newsUploadRequest extends FormRequest
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
            'region' => 'required',
            'title' => 'required| max: 255',
            'image' => 'required| image',
            'text' => 'required| max: 1255',
        ];
    }

    public function messages()
    {
        return [
            '*.max' => 'Привышен лимит символов',
            'title.required' => 'Поле необходимо для заполнения',
            'text.required' => 'Поле необходимо для заполнения',
            'image.required' => 'Пожалуйста, добавьте изображение к новости',
            'image.mimes' => 'Некорректный формат',
            'region.required' => 'Укажите область',

        ];
    }
}
