<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'source_id' => ['required', 'integer', 'min:1', 'exists:sources,id'],
            'author' => ['required', 'string', 'min:2', 'max:50'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'image' => ['nullable', 'image', 'mimes:png,jpg']
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
            'category_id' => 'категория',
            'source_id' => 'источник',
            'author' => 'автор',
            'status' => 'статус',
            'image' => 'изображение'
        ];
    }
}
