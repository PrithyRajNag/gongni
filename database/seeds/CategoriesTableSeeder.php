<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            array('id' => '1', 'name' => 'Trade Licence'),
            array('id' => '2', 'name' => 'Contractor Licence'),
            array('id' => '3', 'name' => 'Vehicle Licence'),

        ];

        foreach ($datas as $data)
        {
            Category::create($data);
        }
    }
}
