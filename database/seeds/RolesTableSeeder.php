<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $roles = [
            [
                "name" => 'admin',
            ],
            [
                "name" => 'mayor',
            ],
            [
                "name" => 'secretary',
            ],
            [
                "name" => 'accountant',
            ],
            [
                "name" => 'engineer',
            ],
            [
                "name" => 'commissioner',
            ],
            [
                "name" => 'receptionist',
            ],
            [
                "name" => 'general',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
