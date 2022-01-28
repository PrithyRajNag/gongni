<?php

use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NoticeTableSeeder extends Seeder
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
                "name" => 'Notice 1',
                "issue_date" => Carbon::createFromFormat('Y-m-d', '2021-01-01'),
//                "expiry_date" => Carbon::createFromFormat('Y-m-d', '2021-01-10'),
                "status" => true,
            ],
            [
                "name"=>'Notice 2',
                "issue_date"=> Carbon::createFromFormat('Y-m-d', '2021-02-11'),
//                "expiry_date"=> Carbon::createFromFormat('Y-m-d', '2021-02-21'),
                "status"=>true,
            ],
            [
                "name"=>'Notice 3',
                "issue_date"=> Carbon::createFromFormat('Y-m-d', '2021-05-15'),
//                "expiry_date"=> Carbon::createFromFormat('Y-m-d', '2021-05-28'),
                "status"=>true,
            ],
            [
                "name"=>'Notice 4',
                "issue_date"=> Carbon::createFromFormat('Y-m-d', '2021-06-12'),
//                "expiry_date"=>Carbon::createFromFormat('Y-m-d', '2021-06-17'),
                "status"=>true,
            ]
        ];
        foreach ($datas as $data){
            Notice::create($data);
        }
    }
}
