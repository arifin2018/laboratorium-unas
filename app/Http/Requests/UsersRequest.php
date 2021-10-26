<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|string|max:150|unique:users,name, '.$this->user,
            'email' => 'required|email|max:255|unique:users,email, '.$this->user,
            'username' => 'required|unique:users,username, '.$this->user,
            'password' => 'required|min:8|string|confirmed',
            'roles' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'NPM'
        ];
    }
}
