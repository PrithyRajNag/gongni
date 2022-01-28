<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTradeLicenceRequest extends FormRequest
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

    public function rules()
    {
        return [
            'business_name' => 'required|min:3',
            'business_name_bn' => 'required|min:3',
            'business_details' => 'required|min:5',
            'shop_holding_no' => 'required',
            'shop_holding_no_bn' => 'required',
            'address' => 'required|min:5',
            'address_bn' => 'required|min:5',
            'road'=>'required',
            'road_bn'=>'required',
            'area' => 'required',
            'area_bn' => 'required',
            'market_name' => 'required',
            'floor_no' => 'required',
            'shop_no' => 'required',
            'business_start_date' => 'required',
            'business_nature' => 'required',
            'authorised_capital' => 'required',
            'paidUp_capital' => 'required',
            'is_factory' => 'required',
            'is_chemical_available' => 'required',
            'plot_type' => 'required',
            'plot_category' => 'required',
            'place' => 'required',
            'activity' => 'required',
            'licence_number' => 'required|unique:trade_licences|min:7',

            'name' => 'required|min:3',
            'name_bn' => 'required|min:3',
            'father_name' => 'required|min:3',
            'father_name_bn' => 'required|min:3',
            'mother_name' => 'required|min:3',
            'mother_name_bn' => 'required|min:3',
            'gender' => 'required',
            'marital_status' => 'required',
            'phone_number' => 'required|min:11|max:14',
            'nid' => 'required|min:10|max:17',
            'dob'=>'required',
            'email'=>'required',
            'bin'=>'required|min:9',
            'passport_no'=>'required|min:9',
            'birth_reg'=>'required|min:17',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            'present_address'=>'required|min:5',
            'present_address_bn'=>'required|min:5',
            'present_holding_no'=>'required',
            'present_holding_no_bn'=>'required',
            'present_address_area'=>'required',
            'present_address_area_bn'=>'required',
            'present_post_code'=>'required',
            'present_post_code_bn'=>'required',
            'present_division_id'=>'required',
            'present_district_id'=>'required',
            'present_thana_id'=>'required',

            'permanent_address'=>'required|min:5',
            'permanent_address_bn'=>'required|min:5',
            'permanent_holding_no'=>'required',
            'permanent_holding_no_bn'=>'required',
            'permanent_address_area'=>'required',
            'permanent_address_area_bn'=>'required',
            'permanent_post_code'=>'required',
            'permanent_post_code_bn'=>'required',
            'permanent_division_id'=>'required',
            'permanent_district_id'=>'required',
            'permanent_thana_id'=>'required',

            'ward_id' => 'required',
            'sub_category_id'=>'required',
        ];
    }
}
