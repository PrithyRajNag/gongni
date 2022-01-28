<?php

use App\Models\Ministry;
use Illuminate\Database\Seeder;

class MinistriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            array('id' => '1','name' => 'President’s Office Public Division'),
            array('id' => '2','name' => 'President’s Office Personal Division'),
            array('id' => '3','name' => 'Prime Minister’s Office'),
            array('id' => '4','name' => 'Armed Forces Division'),
            array('id' => '5','name' => 'Cabinet Division'),
            array('id' => '6','name' => 'Ministry of Chittagong Hill Tracts Affairs'),
            array('id' => '7','name' => 'Ministry of Primary and Mass Education'),
            array('id' => '8','name' => 'Ministry of Agriculture'),
            array('id' => '9','name' => 'Ministry of Civil Aviation and Tourism'),
            array('id' => '10','name' => 'Ministry of Commerce'),
            array('id' => '11','name' => 'Ministry of Road Transport & Highways Division'),
            array('id' => '12','name' => 'Ministry of Road Transport & Bridges Division'),
            array('id' => '13','name' => 'Ministry of Cultural Affairs'),
            array('id' => '14','name' => 'Ministry of Defence'),
            array('id' => '15','name' => 'Ministry of Education'),
            array('id' => '16','name' => 'Ministry of Power Division'),
            array('id' => '17','name' => 'Ministry of Energy and Mineral Resources Division'),
            array('id' => '18','name' => 'Ministry of Environment and Forest'),
            array('id' => '19','name' => 'Ministry of Public Administration'),
            array('id' => '20','name' => 'Ministry of Fisheries and Livestock'),
            array('id' => '21','name' => 'Ministry of Finance, Finance Division'),
            array('id' => '22','name' => 'Ministry of Finance, Economic Relations Division'),
            array('id' => '23','name' => 'Ministry of Finance, Internal Resources Division'),
            array('id' => '24','name' => 'Ministry of Finance, Bank and Financial Institutions Division'),
            array('id' => '25','name' => 'Ministry of Foreign Affairs'),
            array('id' => '26','name' => 'Ministry of Health and Family Welfare'),
            array('id' => '27','name' => 'Ministry of Home Affairs'),
            array('id' => '28','name' => 'Ministry of Housing and Public Works'),
            array('id' => '29','name' => 'Ministry of Industries'),
            array('id' => '30','name' => 'Ministry of Information'),
            array('id' => '31','name' => 'Ministry of Textiles and Jute'),
            array('id' => '32','name' => 'Ministry of Labour & Employment'),
            array('id' => '33','name' => 'Ministry of Law, Justice and Parliamentary Affairs,Law and Justice Division'),
            array('id' => '34','name' => 'Ministry of Law, Justice and Parliamentary Affairs,Legislative and Parliamentary Affairs Division'),
            array('id' => '35','name' => 'Ministry of Law, Justice and Parliamentary Affairs,Parliament Secretariat'),
            array('id' => '36','name' => 'Ministry of Land'),
            array('id' => '37','name' => 'Ministry of Local Government Division'),
            array('id' => '38','name' => 'Ministry of Rural Development and Co-operatives Division'),
            array('id' => '39','name' => 'Ministry of Planning, Planning Division'),
            array('id' => '40','name' => 'Ministry of Planning, Statistics and Informatics Division'),
            array('id' => '41','name' => 'Ministry of Planning, Implementation Monitoring & Evaluation Division'),
            array('id' => '42','name' => 'Ministry of Posts, Telecommunications Division'),
            array('id' => '43','name' => 'Ministry of Information & Communication Technology Division'),
            array('id' => '44','name' => 'Ministry of Religious Affairs'),
            array('id' => '45','name' => 'Ministry of Shipping'),
            array('id' => '46','name' => 'Ministry of Social Welfare'),
            array('id' => '47','name' => 'Ministry of Women and Children Affairs'),
            array('id' => '48','name' => 'Ministry of Water Resources'),
            array('id' => '49','name' => 'Ministry of Youth and Sports'),
            array('id' => '50','name' => 'Ministry of Liberation War Affairs'),
            array('id' => '51','name' => 'Ministry of Expatriates’ Welfare and Overseas Employment'),
            array('id' => '52','name' => 'Ministry of Railways'),
            array('id' => '53','name' => 'Ministry of Science and Technology'),
            array('id' => '54','name' => 'Ministry of Disaster Management and Relief'),
        ];
        foreach ($datas as $data){
            Ministry::create($data);
        }
    }
}
