<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContractorLicenceRequest extends FormRequest
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
            'enlistment_no' => 'required|min:3',
            'application_type' => 'required',
            'applicant_constitution' => 'required',
            'constitution_date' => 'required',
            'vat_reg_no' => 'required|min:4',
            'tin_no' => 'required|min:12',
            'managing_director_name' => 'required|min:3',
            'father_name' => 'required|min:3',
            'mother_name' => 'required|min:3',
            'gender' => 'required',
            'age' => 'required',
            'education_qualification' => 'required',
            'nid' => 'required|min:10|max:17',
            'personal_phone_number' => 'required|min:7|max:14',
            'personal_email' => 'required',
            'business_address_street' => 'required',
            'business_address_post_office' => 'required',
            'business_address_district_id' => 'required',
            'business_address_post_code' => 'required|min:4',
            'business_phone' => 'required|min:7|max:14',
            'business_email' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'account_no' => 'required',
            'technical_employee' =>'required',
            'support_staff' => 'required',
            'other_staff'=> 'required',
            'financial_source'=> 'required',
            'amount'=> 'required',
            'debarred'=> 'required',
            'file.*' => 'required|mimes:doc,pdf,docx|max:10240',
        ];
    }
}
