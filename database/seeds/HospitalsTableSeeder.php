<?php

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
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
                "hospital_type"=>'Private',
                "name"=> 'Parkview Hospital',
                "address"=> 'katalgong' ,
                "phone_number"=> '01786737567',
                "owner_name"=> 'Md. Malek',
                "details"=> 'Near chawkbazar',
                "ward_id"=> 1,
            ],
            [
                "hospital_type"=>'Private',
                "name"=> 'Dental Hospital',
                "address"=> 'GEC' ,
                "phone_number"=> '01786737563',
                "owner_name"=> 'Habibur Rahman',
                "details"=> 'Near agrabad',
                "ward_id"=> 2,
            ],
            [
                "hospital_type"=>'Government',
                "name"=> 'New Hospital',
                "address"=> 'Motijheel' ,
                "phone_number"=> '01744447567',
                "owner_name"=> 'Government',
                "details"=> 'Near Anderkilla',
                "ward_id"=> 3,
            ],


        ];
        foreach ($datas as $data){
            Hospital::create($data);
        }
    }
}
