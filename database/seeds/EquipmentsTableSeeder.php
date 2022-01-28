<?php

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentsTableSeeder extends Seeder
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
                'name'=> 'racker',
                'category_id' => '1',
            ],
            [
                'name'=> 'dump truck',
                'category_id' => '1',
            ],
            [
                'name'=> 'water tank',
                'category_id' => '1',
            ],
        ];
        foreach ($datas as $data){
            Equipment::create($data);
        }
    }
}
