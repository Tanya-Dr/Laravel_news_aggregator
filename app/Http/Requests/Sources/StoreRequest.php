<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'last_build_date' => ['nullable', 'date'],
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id']
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
            'description' => 'описание'
        ];
    }
}
