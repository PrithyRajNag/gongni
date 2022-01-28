<?php

use App\Models\Circular;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CircularsTableSeeder extends Seeder
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
                'name'=>'Circular 1',
                'issue_date'=>Carbon::createFromFormat('Y-m-d','2021-7-19'),
                'expire_date'=>Carbon::createFromFormat('Y-m-d','2021-7-31'),

            ],
            [
                'name'=>'Circular 2',
                'issue_date'=>Carbon::createFromFormat('Y-m-d','2021-7-19'),
                'expire_date'=>Carbon::createFromFormat('Y-m-d','2021-7-31'),

            ],
            [
                'name'=>'Circular 3',
                'issue_date'=>Carbon::createFromFormat('Y-m-d','2021-7-19'),
                'expire_date'=>Carbon::createFromFormat('Y-m-d','2021-7-31'),

            ],
        ];
        foreach ($datas as $data){
            Circular::create($data);
        }
    }
}
