<?php

use App\Models\EquipmentRent;
use Illuminate\Database\Seeder;

class EquipmentRentsTableSeeder extends Seeder
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
                'equipment_name' => 'Hydraulic Truck Crane',
                'equipment_number' => 'ebl-15/4',
                'rental_period' => '24',
                'rental_cost' => '9200',
                'total' => '220800',
                'category' => 'crane',
                'name' => 'escape bangladesh ltd',
                'address' => 'House # 56 , Road # 13, Sector # 12, Uttara, Dhaka –1230, Bangladesh',
                'phone_number' => '01987541236'
            ],
            [
                'equipment_name' => 'Backhoe Loader',
                'equipment_number' => 'ebl-50/1',
                'rental_period' => '48',
                'rental_cost' => '9200',
                'total' => '441600',
                'category' => 'loader',
                'name' => 'escape bangladesh ltd',
                'address' => 'House # 56 , Road # 13, Sector # 12, Uttara, Dhaka –1230, Bangladesh',
                'phone_number' => '01987541236'
            ],
            [
                'equipment_name' => 'Bulldozer',
                'equipment_number' => 'ebl-100/88',
                'rental_period' => '48',
                'rental_cost' => '9200',
                'total' => '441600',
                'category' => 'bulldozer',
                'name' => 'escape bangladesh ltd',
                'address' => 'House # 56 , Road # 13, Sector # 12, Uttara, Dhaka –1230, Bangladesh',
                'phone_number' => '01987541236'
            ],
        ];

        foreach ($datas as $data)
        {
            EquipmentRent::create($data);
        }
    }
}
