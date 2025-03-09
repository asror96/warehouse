<?php

declare(strict_types = 1);

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

final class RequestStoreRequest extends FormRequest
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
            'customer_name' => 'required|string',
            'total_price' => 'required|numeric',
            'item_id' => 'required|exists:items,id',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Возвращает кастомизированные сообщения об ошибках.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'customer_name.required' => 'Поле "Имя клиента" обязательно для заполнения.',
            'customer_name.string' => 'Поле "Имя клиента" должно быть строкой.',
            'total_price.required' => 'Поле "Общая стоимость" обязательно для заполнения.',
            'total_price.numeric' => 'Поле "Общая стоимость" должно быть числом.',
            'item_id.required' => 'Поле "Товар" обязательно для заполнения.',
            'item_id.exists' => 'Выбранный товар не существует.',
            'description.string' => 'Поле "Описание" должно быть строкой.',
        ];
    }
}
