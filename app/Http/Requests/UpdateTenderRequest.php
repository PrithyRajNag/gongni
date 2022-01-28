<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTenderRequest extends FormRequest
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
            'ministry_id'=>'required',
            'entity_name'=>'required',
            'entity_code'=>'required',
            'invitation_for'=>'required',
            'submission_date'=>'required',
            'method'=>'required',
            'budget'=>'required',
            'development_partner'=>'required',
            'package_name'=>'required',
            'package_no'=>'required',
            'programme_name'=>'required',
            'programme_code'=>'required',
            'publish_date'=>'required',
            'last_selling_date'=>'required',
            'closing_date'=>'required',
            'opening_date'=>'required',
            'principle_selling_document'=>'required',
            'receiving_document'=>'required',
            'opening_document'=>'required',
            'other_selling_document'=>'required',
//            'meeting_place'=>'required',
//            'meeting_date'=>'required',
            'eligibility'=>'required',
            'description_goods'=>'required',
//            'description_related_service'=>'required',
            'document_price'=>'required',
            'lot_no'=>'required',
            'identification'=>'required',
            'location'=>'required',
            'security_amount'=>'required',
            'completion'=>'required',
            'official_inviting_name'=>'required',
            'official_inviting_designation'=>'required',
            'official_inviting_address'=>'required',
            'official_inviting_contact_phone'=>'required',
            'official_inviting_contact_fax'=>'required',
            'official_inviting_contact_email'=>'required',
            'file.*' => 'mimes:doc,pdf,docx|max:10240'
        ];
    }
}
