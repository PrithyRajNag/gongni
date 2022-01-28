<?php

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $datas=[
            [
                "name"=> 'Bank,Insurance & Financial Institution ',
                "fees"=> '5000',
                'department_id' => '1'
            ],
            [
                "name"=> 'Institute/Training Center',
                "fees"=> '5000',
                'department_id' => '1'
            ],
            [
                "name"=> 'Contractor/Construction/Supplier Institution',
                "fees"=> '6000',
                'department_id' => '1'
            ],
        ];

        foreach ($datas as $data){
            BusinessCategory::create($data);
        }
    }

}
