<?php

use App\Models\ReliefCategory;
use Illuminate\Database\Seeder;

class ReliefCategoriesTableSeeder extends Seeder
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
                "name"=> 'Natural Disaster',
                "type"=> 'Dry Food',
            ],
            [
                "name"=> 'Earthquake',
                "type"=> 'Wood & Tools',
            ],
            [
                "name"=> 'Flood',
                "type"=> 'Clothes',
            ]
        ];
        foreach ($datas as $data){
            ReliefCategory::create($data);
        }
    }
}
