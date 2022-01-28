<?php

use App\Models\WasteManagement;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WasteManagementTableSeeder extends Seeder
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
                'name'=> 'Abdul Karim',
                'phone_number' => '01987876545',
                'contractual_period' => '12 months',
                'job_type' => 'temporary',
                'join_date' => Carbon::createFromFormat('Y-m-d', '2021-08-02'),
                'salary' => '10000',
                'ward_id' => '2'
            ],
            [
                'name'=> 'Mohammad Helal Uddin',
                'phone_number' => '01777876545',
                'contractual_period' => '6 months',
                'job_type' => 'temporary',
                'join_date' => Carbon::createFromFormat('Y-m-d', '2021-08-02'),
                'salary' => '10000',
                'ward_id' => '1'
            ],
            [
                'name'=> 'Zakir Hossain',
                'phone_number' => '01557876545',
                'contractual_period' => '6 months',
                'job_type' => 'temporary',
                'join_date' => Carbon::createFromFormat('Y-m-d', '2021-08-02'),
                'salary' => '8000',
                'ward_id' => '3'
            ],
        ];

        foreach ($datas as $data){
            WasteManagement::create($data);
        }
    }
}
