<?php

use App\Models\Market;
use Illuminate\Database\Seeder;

class MarketsTableSeeder extends Seeder
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
                "name"=> 'New Market',
                "number"=> 1,
                "area"=> '11/b, K.C Dey Road - 57/a, Chawlkbazar',
                "total_shop"=> 10,
                "details"=> 'Near Kotwali',
                "ward_id"=> 1,
            ],
            [
                "name"=> 'Mimi Super Market',
                "number"=> 2,
                "area"=> 'Probortak',
                "total_shop"=> 50,
                "details"=> 'Near Golpahar',
                "ward_id"=> 2,
            ],
            [
                "name"=> 'sanmar',
                "number"=> 3,
                "area"=> 'GEC',
                "total_shop"=> 150,
                "details"=> 'Near 2 No Gate',
                "ward_id"=> 3,
            ],


        ];
        foreach ($datas as $data){
            Market::create($data);
        }
    }
}
