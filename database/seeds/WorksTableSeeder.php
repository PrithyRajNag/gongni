<?php

use App\Models\Work;
use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
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
                'category'=>'Normal',
                "name"=> 'jabbar',
                "address"=> '2 no gate',
                "phone_number"=> '01987845637',
                "area"=> 'Probortak',
                "details"=> 'details',
                "title"=> 'This is a title',
                "ward_id"=> 2,
                "current_status"=>"complete"
            ],
            [
                'category'=>'Emergency',
                "name"=> 'kuddus',
                "address"=> '1 no gate',
                "phone_number"=> '01007845637',
                "area"=> 'panchlaish',
                "details"=> 'details 2',
                "title"=> 'This is a title 2',
                "ward_id"=> 2,
                "current_status"=>"complete"
            ],
            [
                'category'=>'Normal',
                "name"=> 'abdul',
                "address"=> '23no gate',
                "phone_number"=> '01007845611',
                "area"=> 'agrabad',
                "details"=> 'details 3',
                "title"=> 'This is a title 3',
                "ward_id"=> 1,
                "current_status"=>"in_progress"
            ],
        ];
        foreach ($datas as $data){
            Work::create($data);
        }
    }
}
