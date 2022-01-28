<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEquipmentRentRequest extends FormRequest
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
            'equipment_name' => 'required|min:3',
            'equipment_number' => 'required',
            'rental_period' => 'required',
            'rental_cost' => 'required',
            'category' => 'required',
            'name' => 'required|min:3',
            'address' => 'required',
            'phone_number' => 'required|min:11|max:14',


        ];
    }
}
