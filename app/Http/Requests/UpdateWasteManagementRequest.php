<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWasteManagementRequest extends FormRequest
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
            'phone_number' => 'required|min:11|max:14',
            'job_type' => 'required',
            'contractual_period' => 'required',
            'join_date' => 'required',
            'salary' => 'required',
            'ward_id' => 'required',
            'file' => 'mimes:pdf,doc|max:10240'
        ];
    }
}
