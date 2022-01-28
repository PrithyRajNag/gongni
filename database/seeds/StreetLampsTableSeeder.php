<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StreetLampsTableSeeder extends Seeder
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
                'lamp_name' => 'lamp-01',
                'details' => 'This is a 120 watt light.',
                'area' => 'Hazrat Shahjalal Int. airport ',
                'installation_date' => Carbon::createFromFormat('Y-m-d', '2021-01-01'),
                'road' => 'airport road',
                'category' => 'solar'
            ],
            [
                'lamp_name' => 'lamp-02',
                'details' => 'This is a 120 watt light.',
                'area' => 'dhaka cantonment',
                'installation_date' => Carbon::createFromFormat('Y-m-d', '2021-01-01'),
                'road' => 'saheed sharani',
                'category' => 'solar'
            ],
            [
                'lamp_name' => 'lamp-03',
                'details' => 'This is a 120 watt light.',
                'area' => 'dhaka new market',
                'installation_date' => Carbon::createFromFormat('Y-m-d', '2021-01-01'),
                'road' => 'new market backside road',
                'category' => 'solar'
            ],
        ];
        foreach ($datas as $data)
        {
            \App\Models\StreetLamp::create($data);
        }
    }
}
