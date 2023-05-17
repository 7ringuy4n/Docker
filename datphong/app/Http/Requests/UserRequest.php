<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    private $table = 'user';

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
        $task = $this->task;

        $condAvatar = '';
        $condUserName = '';
        $condEmail = '';
        $condPass = '';
        $condLevel = '';
        $condStatus = '';
        $condFullname = '';


        switch ($task) {
            case 'add':
                $condUserName = "bail|required|between:3,100|unique:$this->table,username";
                $condEmail = "bail|required|email|unique:$this->table,email";
                $condFullname = 'bail|required|min:3';
                $condPass = 'bail|required|between:5,100|confirmed';
                $condStatus = 'bail|in:active,inactive';
                $condLevel = 'bail|in:admin,member';
                $condAvatar = 'bail|required|image|max:500';
                break;
            case 'edit-info':
                $condUserName = "bail|required|between:3,100|unique:$this->table,username,$id";
                $condFullname = 'bail|required|min:3';
                $condAvatar = 'bail|image|max:500';
                $condStatus = 'bail|in:active,inactive';
                $condEmail = "bail|required|email|unique:$this->table,email,$id";
                break;
            case 'change-password':
                $condPass = 'bail|required|between:3,100|confirmed';
                break;
            case 'change-level':
                $condLevel = 'bail|in:admin,member';
                break;
            default:
                break;
        }


        return [
            'username' => $condUserName,
            'email' => $condEmail,
            'fullname' => $condFullname,
            'status' => $condStatus,
            'password' => $condPass,
            'level' => $condLevel,
            'avatar' => $condAvatar
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'fullname' => 'Fullname',
            'status' => 'Status',
            'password' => 'Password',
            'level' => 'Level',
            'avatar' => 'Avatar'
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
