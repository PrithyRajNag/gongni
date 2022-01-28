<?php

use App\Models\SmsTemplate;
use Illuminate\Database\Seeder;

class SmsTemplatesTableSeeder extends Seeder
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
                'title'=>'NID',
                'description'=> 'Your NID has been printed, you can now collect your NID from regional office',
            ],
            [
                'title'=>'Vaccination',
                'description'=> 'Hello, Vaccination Date is 2021-08-29. Please bring your NID with you to get COVID-19 Vaccine' ,
            ],
            [
                'title'=>'Voter Registration',
                'description'=> 'Hello, we are going to start voter enlisting from 28th August 2021, please make sure your enlistment.' ,
            ],
        ];
        foreach ($datas as $data)
        {
            SmsTemplate::create($data);
        }
    }
}
