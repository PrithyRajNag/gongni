<?php

use App\Models\OfficialForm;
use Illuminate\Database\Seeder;

class OfficialFormsTableSeeder extends Seeder
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
                "name"=> 'FIRST FILE ',
//                "file"=> 'This is file 1',

            ],
            [
                "name"=> 'SECOND FILE',
//                "file"=> 'This is file 2',
            ],
            [
                "name"=> 'THIRD FILE',
//                "file"=> 'This is file 3',

            ],


        ];
        foreach ($datas as $data){
            OfficialForm::create($data);
        }
    }
}
