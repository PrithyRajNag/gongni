<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStreetLampRequest extends FormRequest
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
            'lamp_name' => 'required',
            'details' => 'required',
            'area' => 'required',
            'road' => 'required',
            'category' => 'required',
            'installation_date' => 'required',
            'longitude' => 'required',
            'latitude' => 'required'
        ];
    }
}
