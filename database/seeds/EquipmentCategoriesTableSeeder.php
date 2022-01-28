<?php

use App\Models\EquipmentCategory;
use Illuminate\Database\Seeder;

class EquipmentCategoriesTableSeeder extends Seeder
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
                'name' => 'vehicle',
            ],
            [
                'name' => 'crane',
            ],
            [
                'name' => 'tanker',
            ],
        ];
        foreach ($datas as $data){
            EquipmentCategory::create($data);
        }


    }
}
