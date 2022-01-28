
<?php

use App\Models\ContractorCategory;
use Illuminate\Database\Seeder;

class ContractorCategoriesTableSeeder extends Seeder
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
                "name"=> 'Civil Contractors',
                "fees"=> '5000',
                'department_id' => '3',
            ],
            [
                "name"=> 'Electrical Contractor',
                "fees"=> '5000',
                'department_id' => '3',
            ],
            [
                "name"=> 'Mechanical Contractor',
                "fees"=> '5000',
                'department_id' => '3',
            ],

        ];
        foreach ($datas as $data){
            ContractorCategory::create($data);
        }
    }
}
