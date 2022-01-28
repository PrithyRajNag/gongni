<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UserSeeder::class);
        /*Independent*/
        $this->call(RolesTableSeeder::class);
        $this->call(BloodGroupsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(ThanasTableSeeder::class);
        $this->call(MinistriesTableSeeder::class);
        $this->call(SmsTemplatesTableSeeder::class);




        /*Dependent*/
        $this->call(UsersTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(PeoplesTableSeeder::class);
        $this->call(NoticeTableSeeder::class);
        $this->call(MarketsTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(EducationInstitutionsTableSeeder::class);
        $this->call(PublicToiletsTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(VehicleLicencesTableSeeder::class);
        $this->call(ReliefCategoriesTableSeeder::class);
        $this->call(ReliefCardsTableSeeder::class);
        $this->call(ContractorLicencesTableSeeder::class);
        $this->call(ContractorCategoriesTableSeeder::class);
        $this->call(BusinessCategoriesTableSeeder::class);
        $this->call(VehicleTypesTableSeeder::class);
        $this->call(CharacterCertificatesTableSeeder::class);
        $this->call(OfficialFormsTableSeeder::class);
        $this->call(EquipmentCategoriesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(TradeLicencesTableSeeder::class);
        $this->call(CircularsTableSeeder::class);
        $this->call(TendersTableSeeder::class);
        $this->call(EmergencyCallsTableSeeder::class);
        $this->call(OfficialOrdersTableSeeder::class);
        $this->call(WasteManagementTableSeeder::class);
        $this->call(EquipmentRentsTableSeeder::class);
        $this->call(StreetLampsTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);


    }
}
