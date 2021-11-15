<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeedBackRequest extends FormRequest
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
            'title'=>[
                'required',
                'string',
            ],
            'description'=>[
                'required',
                'string',
            ],
            'user_id'=>[
                'required',
                'integer',
            ],
            'file' => [
                'sometimes',
                'mimes:doc,docx,pdf,rtf',
                'max:30000000'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле обезательно для заполнения',
            'title.string' => 'Поле обезательно должно соответствовати типу строка',
            'description.required' => 'Поле обезательно для заполнения',
            'description.string' => 'Поле обезательно должно соответствовати типу строка',
            'user_id.required' => 'отсутствует идентефикатор пользователя',
            'user_id.integer' => 'поле не соответствует числовому типу',
            'file.mimes' => 'формат файла не соответстуеть указаному doc,docx,pdf,rtf',
            'file.max' => 'превышен максимальный розмер файла ',

        ];
    }
}
