<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mews\Purifier\Facades\Purifier;

class StoreNoteRequest extends FormRequest
{
    /**
     * Определить, авторизован ли пользователь для выполнения этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Разрешить только аутентифицированным пользователям
        //return auth()->check();

        // УБРАТЬ это безобразие, как только исправятся косяки с авторизацией
        return true;
    }

    /**
     * Получить правила валидации, применяемые к запросу.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'completed' => 'sometimes|boolean',
        ];
    }

    /**
     * Подготовить данные для валидации.
     */
    protected function prepareForValidation()
    {
        if ($this->has('name')) {
            $this->merge([
                'name' => Purifier::clean($this->input('name'), 'default'),
            ]);
        }

        if ($this->has('description')) {
            $this->merge([
                'description' => Purifier::clean($this->input('description'), 'default'),
            ]);
        }
    }

    /**
     * (Опционально) Настроить пользовательские сообщения об ошибках.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Название заметки обязательно.',
            'name.string' => 'Название заметки должно быть строкой.',
            'name.max' => 'Название заметки не должно превышать 255 символов.',
            'description.required' => 'Описание заметки обязательно.',
            'description.string' => 'Описание заметки должно быть строкой.',
            'completed.boolean' => 'Статус "Выполнено" должен быть логическим значением.',
        ];
    }
}
