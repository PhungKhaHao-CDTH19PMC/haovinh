<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
class SuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role_Admin = Role::create([
            'name'  => 'Super Admin'
        ]);
    }
}
