<?php

use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas =[
            [
                'type'=>'Auto',
                'fees'=>'2000',
                'department_id' => '2',
            ],
            [
                'type'=>'Van',
                'fees'=>'500',
                'department_id' => '2',
            ],
            [
                'type'=>'Rickshaw',
                'fees'=>'500',
                'department_id' => '2',
            ],
        ];

        foreach ($datas as $data){
            VehicleType::create($data);
        }
    }
}
