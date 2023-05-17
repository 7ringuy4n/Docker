<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    private $table = 'slider';

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
        $id = $this->id;

        $condThumb = 'bail|required|image|max:2048';
        $condName = "bail|required|between:5,100|unique:$this->table,name";

        if (!empty($id)) {
            $condThumb = 'bail|image|max:2048';
            $condName .= ",$id";
        }

        return [
            'en.name' => 'bail|required',
            'ja.name' => 'bail|required',
            'status' => 'bail|in:active,inactive',
            'thumb' => $condThumb
        ];
    }

    public function attributes()
    {
        return [
            'ja.name' => 'Tên tiếng Nhật',
            'en.name' => 'Tên tiếng Anh',
            'status' => 'Trạng thái',
            'thumb' => 'Hình ảnh',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được rỗng',
            'between' => ':attribute giá trị :input không nằm trong khoảng :min - :max.',
            'in' => ':attribute: phải khác giá trị mặc định'
        ];
    }
}
