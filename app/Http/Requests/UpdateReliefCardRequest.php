<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReliefCardRequest extends FormRequest
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
            'card_number'=>'required|gt:0',
            'ward_id'=>'required',
            'people_id'=>'required',
            'category_id'=>'required',
        ];
    }
}
