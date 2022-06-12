<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'phone' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'info' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Вы не заполнили поле :attribute'
        ];
    }

    public function attributes(): array
    {
        return [
            'phone' => 'номер телефона',
            'email' => 'электронная почта',
            'info' => 'информация'
        ];
    }
}
