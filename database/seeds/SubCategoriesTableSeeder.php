<?php

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
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
                'name' => 'Bank,Insurance & Financial Institution',
                'category_id'=> '1',
                'licence_fees' => '5000',
                'renewal_fees' => '5000',
            ],
            [
                'name' => 'Institute/Training Center',
                'category_id'=> '1',
                'licence_fees' => '5000',
                'renewal_fees' => '5000',
            ],
            [
                'name' => 'Electrical Contractor',
                'category_id'=> '2',
                'licence_fees' => '5000',
                'renewal_fees' => '2000',
            ],
            [
                'name' => 'Mechanical Contractor',
                'category_id'=> '2',
                'licence_fees' => '5000',
                'renewal_fees' => '2000',
            ],
            [
                'name' => 'Auto',
                'category_id'=> '3',
                'licence_fees' => '1000',
                'renewal_fees' => '500',
            ],
            [
                'name' => 'Rickshaw',
                'category_id'=> '3',
                'licence_fees' => '500',
                'renewal_fees' => '250',
            ],
        ];

        foreach ($datas as $data)
        {
            SubCategory::create($data);
        }
    }
}
