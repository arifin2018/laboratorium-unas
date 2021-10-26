<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisiMisiRequest extends FormRequest
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
            'visi' => 'required|min:20',
            'misi' => 'required|min:20',
        ];
    }
}
