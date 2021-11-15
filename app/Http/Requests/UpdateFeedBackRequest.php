<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedBackRequest extends FormRequest
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
            'status_id'=>[
                'required',
                'integer',
            ],

        ];
    }

    public function messages()
    {
        return [
            'status_id.required' => 'Статус не выбран',
            'status_id.integer' => 'поле не соответствует числовому типу',
        ];
    }
}
