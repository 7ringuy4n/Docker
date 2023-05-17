<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    private $table = 'article';

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
            'vi.name' => 'bail|required',
            'vi.slug' => 'bail|required',
            'en.slug' => 'bail|required',
            'en.description' => 'bail|required',
            'vi.description' => 'bail|required',
            'en.content' => 'bail|required',
            'vi.content' => 'bail|required',
            'status' => 'bail|required|in:active,inactive',
        ];
    }

    public function attributes()
    {
        return [
            'vi.name' => 'Name Vietnamese',
            'en.name' => 'Name English',
            'vi.slug' => 'Slug Vietnamese',
            'en.slug' => 'Slug English',
            'vi.description' => 'Description Vietnamese',
            'en.description' => 'Description English',
            'vi.content' => 'Content Vietnamese',
            'en.content' => 'Content English',
            'status' => 'Status',
        ];
    }

    public function messages()
    {
        return [
            'required' => ' :attribute is not empty',
            'between' => ' :attribute value :input is not between :min - :max.',
            'in' => ' :attribute: is not default value',
            'not_id' => ' :attribute: is not default value',
            'numeric' => ' :attribute: is type number',
            'min' => ' :attribute: min value is :min',
        ];
    }
}