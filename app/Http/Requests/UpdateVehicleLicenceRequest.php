<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleLicenceRequest extends FormRequest
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
            'subCategory_id'=>'required',
            'name' => 'required|min:3',
            'licence_number' => 'required|min:3',
            'father_name' => 'required|min:3',
            'mother_name' => 'required|min:3',
            'owner_name' => 'required|min:3',
            'gender' => 'required',
            'phone_number' => 'required|min:11|max:14',
            'address' => 'required|min:3',
            'nid' => 'required',
            'expiry_date'=>'required',
        ];
    }
}
