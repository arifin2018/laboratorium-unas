<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesDetailRuanganRequest extends FormRequest
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
        if (request()->isMethod('PUT')) {
            return [
                'detail_ruangans_id' => 'required|integer|max:150',
                'images' => 'image|file|mimes:png,jpg,jpeg,svg',
            ];
        }else{
            return [
                'detail_ruangans_id' => 'required|integer|max:150',
                'images' => 'required|image|file|mimes:png,jpg,jpeg,svg',
            ];
        }

    }
}
