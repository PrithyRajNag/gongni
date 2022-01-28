<?php

use App\Models\EmergencyCall;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmergencyCallsTableSeeder extends Seeder
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
                'name' => 'tanvir Hossain',
                'phone_number'=>'01767656564',
                'date_of_call' => Carbon::createFromFormat('Y-m-d', '1980-07-28'),
                'details' => 'The main road of jhautala residential area is damaged since 1 year.',
                'current_status' => 'pending',
            ],
            [
                'name' => 'Rashedul Islam',
                'phone_number'=>'01867656564',
                'date_of_call' => Carbon::createFromFormat('Y-m-d', '1980-07-28'),
                'details' => 'The main drain of jhautala residential area is unusable since 3 years.',
                'current_status' => 'in_progress',
            ],
            [
                'name' => 'Ashraf Ahmed',
                'phone_number'=>'01967656564',
                'date_of_call' => Carbon::createFromFormat('Y-m-d', '1980-07-28'),
                'details' => 'Emergency Transformer Replacement ',
                'current_status' => 'pending',
            ],
        ];

        foreach ($datas as $data)
        {
            EmergencyCall::create($data);
        }

    }
}
