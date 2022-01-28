<?php

use App\Models\Ward;
use Illuminate\Database\Seeder;

class WardsTableSeeder extends Seeder
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
                "name"=> 'Rohmothgonj',
                "number"=> 1,
                "area"=> '11/b, K.C Dey Road - 57/a, Chawlkbazar',
            ],
            [
                "name"=> 'Katungonj',
                "number"=> 2,
                "area"=> '45, Kashem Ali Road - 12, Mira Bazar Road ',
            ],
            [
                "name"=> 'Pathorghata',
                "number"=> 3,
                "area"=> '1, Shatish Babu Lane - 44, Kashem Ali Road',
            ]
        ];
        foreach ($datas as $data){
            Ward::create($data);
        }
    }
}
