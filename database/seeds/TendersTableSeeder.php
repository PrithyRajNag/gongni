<?php

use App\Models\Tender;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class TendersTableSeeder extends Seeder
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
                'ministry_id'=>'11',
                'entity_name' => 'Ministry of Road Transport and Bridges, Road Transport and Highways Division',
                'entity_code'=>'50-Ministry of Road Transport and Bridges',
                'invitation_for'=>'work',
                'submission_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-17'),
                'method'=>'OTM ',
                'budget'=>'Revenue Budget (GoB)',
                'development_partner'=> 'Islamic Development Bank Group (IsDB)',
                'package_name'=>'Envelope',
                'package_no'=>'2233',
                'programme_name'=>'Annual Report Envelope Design & Printing',
                'programme_code'=>'E-123',
                'publish_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-22'),
                'last_selling_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-21'),
                'closing_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-29'),
                'opening_date'=>Carbon::createFromFormat('Y-m-d', '2021-07-23'),
                'principle_selling_document'=>'Room No. 809 (8th Floor), Bhaban No. 7, Road Transport and Highways Division, Ministry of Road Transport and Bridges, Bangladesh Secretariat, Dhaka',
                'receiving_document'=> 'Room No. 809 (8th Floor), Bhaban No. 7, Road Transport and Highways Division, Ministry of Road Transport and Bridges, Bangladesh Secretariat, Dhaka',
                'opening_document'=>'Room No. 822 (8th Floor), Bhaban No. 7, Road Transport and Highways Division, Ministry of Road Transport and Bridges. Bangladesh Secretariat. Dhaka',
                'other_selling_document'=>'Not Applicable',
                'eligibility'=>'The Tenderer should be well-experienced with valid Trade License; Income Tax Certificate, VAT Registration Certificate, Experience Certificate, Bank Solvency Certificate etc.',
                'description_goods'=>'Progress of 9 Years, Annual Report 2016-2017, Annual Report Envelope Design & Printing',
                'description_related_service'=>'Not Applicable',
                'document_price'=>'1000',
                'lot_no'=>'1',
                'identification'=>'Progress of9 Years, Annual Report 2016-2017, Annual Report Envelope Design & Printing',
                'location'=>'Ministry of Road Transport and Bridges, Road Transport and Highway Division Dhaka',
                'security_amount'=>'60000',
                'completion'=>'07(Seven) Days after Award of Contract',
                'official_inviting_name'=>'Md. Ahsan Ullah',
                'official_inviting_designation'=>'Assistant Secretary',
                'official_inviting_address'=>'Room No. 822/B (8th Floor), Bhaban No. 7, Road Transport and Highways Division, Ministry of Road Transport and Bridges, Bangladesh Secretariat, Dhaka',
                'official_inviting_contact_phone'=>'9584128',
                'official_inviting_contact_fax'=>'9585138',
                'official_inviting_contact_email'=>'sasadminrthd.gov.bd',
            ],
            [
                'ministry_id'=>'7',
                'entity_name' => 'Ministry of Primary and Mass Education',
                'entity_code'=>'80-Ministry of Primary and Mass Education',
                'invitation_for'=>'work',
                'submission_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-17'),
                'method'=>'OTM ',
                'budget'=>'Revenue Budget (GoB)',
                'development_partner'=> 'European Eunion (EU)',
                'package_name'=>'Designing & Printing Books',
                'package_no'=>'2233',
                'programme_name'=>'Designing & Printing Books for Primary & Secondary',
                'programme_code'=>'B-008',
                'publish_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-22'),
                'last_selling_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-21'),
                'closing_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-29'),
                'opening_date'=>Carbon::createFromFormat('Y-m-d', '2021-07-23'),
                'principle_selling_document'=>'Building # 6, Bangladesh Secretariat, Dhaka',
                'receiving_document'=> 'Building # 6, Bangladesh Secretariat, Dhaka',
                'opening_document'=>'Building # 6, Bangladesh Secretariat, Dhaka',
                'other_selling_document'=>'Not Applicable',
                'eligibility'=>'The Tenderer should be well-experienced with valid Trade License; Income Tax Certificate, VAT Registration Certificate, Experience Certificate, Bank Solvency Certificate etc.',
                'description_goods'=>'',
                'description_related_service'=>'Not Applicable',
                'document_price'=>'1000',
                'lot_no'=>'1',
                'identification'=>'Designing & Printing Books for Primary & Secondary',
                'location'=>'Building # 6, Bangladesh Secretariat, Dhaka',
                'security_amount'=>'60000',
                'completion'=>'30(Thirty) Days after Award of Contract',
                'official_inviting_name'=>'Md. Jamal Hammadi',
                'official_inviting_designation'=>'Assistant Secretary',
                'official_inviting_address'=>'Building # 6, Bangladesh Secretariat, Dhaka',
                'official_inviting_contact_phone'=>'9584128',
                'official_inviting_contact_fax'=>'9585138',
                'official_inviting_contact_email'=>'emadminrthd.gov.bd',
            ],

            [
            'ministry_id'=>'14',
            'entity_name' => 'Ministry of Defence',
            'entity_code'=>'60-Ministry of Defence',
            'invitation_for'=>'work',
            'submission_date'=> Carbon::createFromFormat('Y-m-d','2021-07-17'),
            'method'=>'OTM ',
            'budget'=>'Revenue Budget (GoB)',
            'development_partner'=> 'IMF',
            'package_name'=>'Road',
            'package_no'=>'2234',
            'programme_name'=>'Production of Training Equipment for soldiers',
            'programme_code'=>'R-145',
            'publish_date'=> Carbon::createFromFormat('Y-m-d' ,'2021-07-22'),
            'last_selling_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-21'),
            'closing_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-29'),
            'opening_date'=> Carbon::createFromFormat('Y-m-d', '2021-07-23'),
            'principle_selling_document'=>'Ganobhabon Complex, Shere Bangla Nagar, Dhaka-1207',
            'receiving_document'=> 'Ganobhabon Complex, Shere Bangla Nagar, Dhaka-1207',
            'opening_document'=>'Ganobhabon Complex, Shere Bangla Nagar, Dhaka-1207',
            'other_selling_document'=>'Not Applicable',
            'eligibility'=>'The Tenderer should be well-experienced with valid Trade License; Income Tax Certificate, VAT Registration Certificate, Experience Certificate, Bank Solvency Certificate etc.',
            'description_goods'=>'',
            'description_related_service'=>'Not Applicable',
            'document_price'=>'1000',
            'lot_no'=>'1',
            'identification'=>'Production of Training Equipment for soldiers',
            'location'=>'Ganobhabon Complex, Shere Bangla Nagar, Dhaka-1207',
            'security_amount'=>'60000',
            'completion'=>'07(Seven) Days after Award of Contract',
            'official_inviting_name'=>'Md. Mostafa Khondokar',
            'official_inviting_designation'=>'Assistant Secretary',
            'official_inviting_address'=>'Ganobhabon Complex, Shere Bangla Nagar, Dhaka-1207',
            'official_inviting_contact_phone'=>'9584128',
            'official_inviting_contact_fax'=>'9585138',
            'official_inviting_contact_email'=>'dfadminrthd.gov.bd',
        ]
        ];
        foreach ($datas as $data){
            Tender::create($data);
        }
    }
}
