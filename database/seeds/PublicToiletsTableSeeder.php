<?php

use App\Models\PublicToilet;
use Illuminate\Database\Seeder;

class PublicToiletsTableSeeder extends Seeder
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
                "name" => 'Jamal Khan Public Toilet',
                "public_toilet_number"=>'9101991',
                "maintain_people_name"=> 'Abdul Kashem' ,
                "address"=> 'jamal khan',
                "phone_number"=> '09876543218',
                "ward_id"=> 1,
            ],
            [
                "name" => 'Lalkhan Bazar Public Toilet',
                "public_toilet_number"=>'757575',
                "maintain_people_name"=> 'Abdul Rahim' ,
                "address"=> 'lalkhan bazar',
                "phone_number"=> '01897564783',
                "ward_id"=> 3,
            ],
            [
                "name" => 'Anayet Bazar Public Toilet',
                "public_toilet_number"=>'9101991',
                "maintain_people_name"=> 'Abdul Kashem' ,
                "address"=> 'anayet bazar',
                "phone_number"=> '01674563546',
                "ward_id"=> 2,
            ],
        ];

            foreach ($datas as $data){
                PublicToilet::create($data);
            }
    }
}
