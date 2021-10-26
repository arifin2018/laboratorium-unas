<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaktuDetailRuanganRequest extends FormRequest
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
            'details_ruangan_id' => 'required|integer',
            'waktu' => 'required|max:10|string'
        ];
    }
}
