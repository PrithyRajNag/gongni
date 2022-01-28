<?php

use App\Models\OfficialOrder;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OfficialOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'Office Order 1',
                'date' => Carbon::createFromFormat('Y-m-d', '2021-07-31'),
            ],
            [
                'name' => 'Office Order 2',
                'date' => Carbon::createFromFormat('Y-m-d', '2021-07-31'),
            ],
            [
                'name' => 'Office Order 3',
                'date' => Carbon::createFromFormat('Y-m-d', '2021-07-31'),
            ],
        ];

        foreach ($datas as $data){
            OfficialOrder::create($data);
        }

    }
}
