<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
{
    private $table = 'facility';

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
        $condThumbContent = 'bail|image|max:2048';
        $condName = "bail|required|between:5,100|unique:$this->table,name";

        if (!empty($id)) {
            $condThumb = 'bail|image|max:2048';
            $condName .= ",$id";
        }

        return [
            'en.name' => 'bail|required',
            'ja.name' => 'bail|required',
            'status' => 'bail|in:active,inactive',
            'thumb' => $condThumb,
            'thumb_content' => $condThumbContent
        ];
    }

    public function attributes()
    {
        return [
            'ja.name' => 'Tên tiếng Nhật',
            'en.name' => 'Tên tiếng Anh',
            'status' => 'Trạng thái',
            'thumb' => 'Ảnh chính',
            'thumb_content' => 'Ảnh cho nội dung',
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
