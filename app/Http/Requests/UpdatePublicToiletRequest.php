<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublicToiletRequest extends FormRequest
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
            'name' => 'required|min:3',
            'public_toilet_number'=>'required',
            'maintain_people_name'=>'required',
            'phone_number' => 'required|min:11|max:14',
            'address' => 'required',
            'details' => 'required|min:3',

            'ward_id' => 'required',
        ];
    }
}
