<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    private $table = 'room';

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
            'en.name' => 'bail|required',
            'ja.name' => 'bail|required',
            'status' => 'bail|required|in:active,inactive',
        ];
    }

    public function attributes()
    {
        return [
            'ja.name' => 'Tên tiếng Nhật',
            'en.name' => 'Tên tiếng Anh',
            'vi.slug' => 'Slug tiếng Việt',
            'en.slug' => 'Slug tiếng Anh',
            'vi.description' => 'Mô tả tiếng Việt',
            'en.description' => 'Mô tả tiếng Anh',
            'vi.content' => 'Nội dung tiếng Việt',
            'en.content' => 'Nội dung tiếng Anh',
            'status' => 'Trạng thái',
            'supplier_id' => 'Nhà cung cấp',
            'category_id' => 'Danh mục',
            'state' => 'Tình trạng phòng',
        ];
    }

    public function messages()
    {
        return [
            'required' => ' :attribute không được rỗng',
            'between' => ' :attribute giá trị :input không nằm trong :min - :max.',
            'in' => ' :attribute: phải khác giá trị mặc định',
            'not_id' => ' :attribute: phải khác giá trị mặc định',
            'numeric' => ' :attribute: phải là số',
            'min' => ' :attribute: nhỏ nhất là :min',
        ];
    }
}