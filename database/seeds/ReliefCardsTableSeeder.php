<?php

use App\Models\ReliefCard;
use Illuminate\Database\Seeder;

class ReliefCardsTableSeeder extends Seeder
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
                'category_id'=>'1',
                'people_id'=>'1',
                'ward_id'=>'1',
                'card_number'=>'9999192929',
            ],
            [
                'category_id'=>'2',
                'people_id'=>'3',
                'ward_id'=>'3',
                'card_number'=>'9090898899',
            ],
            [
                'category_id'=>'3',
                'people_id'=>'2',
                'ward_id'=>'2',
                'card_number'=>'445555666',
            ],
        ];
        foreach ($datas as $data){
            ReliefCard::create($data);
        }

    }
}
