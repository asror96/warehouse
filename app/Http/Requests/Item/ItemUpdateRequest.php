<?php

declare(strict_types = 1);

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

final class ItemUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'category_id.required' => 'Поле "Категория" обязательно для заполнения.',
            'category_id.exists' => 'Выбранная категория не существует.',
            'price.required' => 'Поле "Цена" обязательно для заполнения.',
            'price.numeric' => 'Поле "Цена" должно быть числом.',
            'price.min' => 'Цена не может быть отрицательной.',
            'price.gt' => 'Цена должна быть больше нуля.',
        ];
    }
}
