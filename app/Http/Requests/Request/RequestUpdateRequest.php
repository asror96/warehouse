<?php

declare(strict_types = 1);

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

final class RequestUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string',
            'status' => 'required|string|in:pending,completed',
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
            'customer_name.min' => 'Имя клиента должно содержать не менее 2 символов.',
            'status.required' => 'Поле "Статус" обязательно для заполнения.',
            'status.string' => 'Поле "Статус" должно быть строкой.',
            'status.in' => 'Недопустимое значение для поля "Статус". Допустимые значения: pending, completed.',
            'item_id.required' => 'Поле "Товар" обязательно для заполнения.',
            'item_id.exists' => 'Выбранный товар не существует.',
            'description.string' => 'Поле "Описание" должно быть строкой.',
            'description.max' => 'Описание не должно превышать 1000 символов.',
        ];
    }
}
