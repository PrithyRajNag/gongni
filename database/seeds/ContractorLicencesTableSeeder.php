<?php

use App\Models\ContractorLicence;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContractorLicencesTableSeeder extends Seeder
{

    public function run()
    {
        $datas = [
            [
                'enlistment_no' => '990',
                'application_type' => 'first_time_application',
                'applicant_name' => 'Imran',
                'applicant_constitution' => 'proprietorship',
                'constitution_date' => Carbon::createFromFormat('Y-m-d', '2021-06-17'),
                'vat_reg_no' =>'000006756',
                'tin_no' =>'989876765434',
                'managing_director_name' => 'Imran',
                'age' => '55',
                'education_qualification' => 'Bachelor in Business Administration',
                'father_name' => 'Asif Khan',
                'mother_name' => 'Rukhsana Begum',
                'gender' => 'male',
                'personal_phone_number' => '01680333403',
                'personal_email' => 'imran@gmail.com',
                'nid' => '11115304625165',
                'business_address_street' =>'Pragati Sharani Road',
                'business_address_post_office' => 'khilkhet post office',
                'business_address_district_id' => '50',
                'business_address_post_code' => '1229',
                'business_phone' => '01676756434',
                'business_email' => 'xyz@gmail.com',
                'bank_name' => 'Rupali Bank Ltd.',
                'branch' => 'Nikunja Branch',
                'account_no' => '897865443456',
                'technical_employee' => '30',
                'support_staff' => '20',
                'other_staff' => '10',
                'equipment_name' => 'N/A',
                'number' => 'N/A',
                'year' => 'N/A',
                'condition' => 'N/A',
                'financial_source' => 'personal',
                'amount' => '50000000',
                'debarred' => 'no',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2021-08-7'),
                'expiry_date' => Carbon::createFromFormat('Y-m-d', '2022-08-7'),

                'subCategory_id' => '3',


            ],
            [
                'enlistment_no' => '100',
                'application_type'=> 'first_time_application',
                'applicant_name'=> 'MD. Fazlul KArim',
                'applicant_constitution' => 'proprietorship',
                'constitution_date' => Carbon::createFromFormat('Y-m-d', '2021-06-17'),
                'vat_reg_no' => '000005556',
                'tin_no' => '989776765434',
                'managing_director_name' => 'MD. Fazlul Karim',
                'age' => '60',
                'education_qualification' => 'Bachelor in Business Administration',
                'father_name' => 'Abdul Bashar',
                'mother_name' => 'Jannat Begum',
                'gender' => 'male',
                'personal_phone_number' => '01880333403',
                'personal_email' => 'fazlul@gmail.com',
                'nid' => '44425304625165',
                'business_address_street' =>'Baridhara, Bashundhara',
                'business_address_post_office' => 'khilkhet post office',
                'business_address_district_id' => '51',
                'business_address_post_code' => '1229',
                'business_phone' => '01676756434',
                'business_email' => 'fazlulbusiness@gmail.com',
                'bank_name' => 'Sonali Bank Ltd.',
                'branch' => 'Nikunja Branch',
                'account_no' => '007865443456',
                'technical_employee' => '30',
                'support_staff' => '20',
                'other_staff' => '10',
                'equipment_name' => 'N/A',
                'number' => 'N/A',
                'year' => 'N/A',
                'condition' => 'N/A',
                'financial_source' => 'personal',
                'amount' => '50000000',
                'debarred' => 'no',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2021-08-7'),
                'expiry_date' => Carbon::createFromFormat('Y-m-d', '2022-08-7'),
                'subCategory_id' => '4',


            ],
            [
                'enlistment_no' => '80',
                'application_type'=>'first_time_application',
                'applicant_name'=>'MD.Alam',
                'applicant_constitution' =>'partnership',
                'constitution_date' => Carbon::createFromFormat('Y-m-d', '2021-06-17'),
                'vat_reg_no' =>'000005656',
                'tin_no' =>'989776767874',
                'managing_director_name' => 'MD.Alam',
                'age' => '60',
                'education_qualification' => 'Bachelor in Business Administration',
                'father_name' => 'Alif Hossain',
                'mother_name' => 'Fatema Begum',
                'gender' => 'male',
                'personal_phone_number' => '01880333403',
                'personal_email' => 'alam@gmail.com',
                'nid' => '00025304625165',
                'business_address_street' =>'Baridhara, Bashundhara',
                'business_address_post_office' => 'khilkhet post office',
                'business_address_district_id' => '52',
                'business_address_post_code' => '1229',
                'business_phone' => '01676756434',
                'business_email' => 'alambusiness@gmail.com',
                'bank_name' => 'Sonali Bank Ltd.',
                'branch' => 'Nikunja Branch',
                'account_no' => '007865443456',
                'technical_employee' => '30',
                'support_staff' => '20',
                'other_staff' => '10',
                'equipment_name' => 'N/A',
                'number' => 'N/A',
                'year' => 'N/A',
                'condition' => 'N/A',
                'financial_source' => 'personal',
                'amount' => '50000000',
                'debarred' => 'no',
                'start_date' => Carbon::createFromFormat('Y-m-d', '2021-08-7'),
                'expiry_date' => Carbon::createFromFormat('Y-m-d', '2022-08-7'),
                'subCategory_id' => '3',


            ],
        ];
        foreach ($datas as $data){
            ContractorLicence::create($data);
        }
    }

}
