<?php

use App\Models\EducationInstitution;
use Illuminate\Database\Seeder;

class EducationInstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [
                "institution_category"=>'Private',
                "institution_type"=> 'school',
                "name"=> 'M.A Jalil High School' ,
                "code"=>'388383',
                "principle_name"=> 'Mahtab Uddin',
                "address"=> 'S.K Sheikh Mujib Road,Agrabad Chittagong',
                "phone_number"=> '09876543218',
                "ward_id"=> 1,
            ],
            [
                "institution_category"=>'Government',
                "institution_type"=> 'college',
                "name"=> 'B.N College' ,
                "code"=>'984839',
                "principle_name"=> 'Md.Russel',
                "address"=> 'Air Port Road,Chittagong',
                "phone_number"=> '01987656564',
                "ward_id"=> 2,
            ],
            [
                "institution_category"=>'Private',
                "institution_type"=> 'university',
                "name"=> 'Port City international University' ,
                "code"=>'757575',
                "principle_name"=> 'Md. Zahed Uddin',
                "address"=> 'Khulshi,Chittagong',
                "phone_number"=> '01878765643',
                "ward_id"=> 3,
            ],
        ];
        foreach ($datas as $data){
            EducationInstitution::create($data);
        }
    }
}
