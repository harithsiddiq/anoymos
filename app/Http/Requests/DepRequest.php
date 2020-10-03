<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepRequest extends FormRequest
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
            'dep_name_ar' => 'required',
            'dep_name_en' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'icon' => 'sometimes'
        ];
    }
}
