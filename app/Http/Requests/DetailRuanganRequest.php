<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRuanganRequest extends FormRequest
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
            'title' => 'required|string|max:150|unique:detail_ruangans,title, '.$this->detail_ruangan,
            'kepala_jabatan' => 'required|string|max:150|unique:detail_ruangans,kepala_jabatan, '.$this->detail_ruangan,
            'details' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'NPM'
        ];
    }
}
