<?php

use App\Models\CharacterCertificate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CharacterCertificatesTableSeeder extends Seeder
{

    public function run()
    {
        $datas=[
            [
                'serial'=> '9725',
                'people_id'=>'1',
                'issue_date'=> Carbon::createFromFormat('Y-m-d', '2021-06-30'),

            ],
            [
                'serial'=> '9726',
                'people_id'=>'2',
                'issue_date'=> Carbon::createFromFormat('Y-m-d', '2021-06-30'),
            ],
            [
                'serial'=> '9727',
                'people_id'=>'3',
                'issue_date'=> Carbon::createFromFormat('Y-m-d', '2021-06-30'),
            ],
        ];
        foreach ($datas as $data){
            CharacterCertificate::create($data);
        }
    }
}
