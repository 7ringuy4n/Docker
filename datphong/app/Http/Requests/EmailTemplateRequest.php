<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
{
    private $table = 'email_template';

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
            'name' => 'bail|required|between:5,255',
            'title' => 'bail|required|between:5,1000',
            'content' => 'bail|required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Mã',
            'title' => 'Tiêu đề',
            'content' => 'Content',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is not empty',
            'between' => ':attribute giá trị :input không nằm trong khoảng :min - :max.',
            'in' => ':attribute: is not default value'
        ];
    }

}
