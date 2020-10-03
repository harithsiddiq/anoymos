<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManuFactRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'facebook' => 'sometimes|url',
            'twitter' => 'sometimes|url',
            'website' => 'sometimes|url',
            'contact_name' => 'sometimes',
            'lng' => 'sometimes',
            'lat' => 'sometimes',
            'icon' => ''
        ];
    }
}
