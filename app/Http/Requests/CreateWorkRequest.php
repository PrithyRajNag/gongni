<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkRequest extends FormRequest
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
            'category'=>'required',
            'name' => 'required|min:3',
            'phone_number' => 'required|min:11|max:14',
            'address' => 'required|min:3',
            'area'=> 'required',
            'current_status'=> 'required',
            'details' => 'required|min:3',
            'title' => 'required|min:3',

            'ward_id' => 'required',

        ];
    }
}
