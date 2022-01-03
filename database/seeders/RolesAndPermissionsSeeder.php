<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // * Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // * Create permissions for send email
        Permission::create(['name' => 'send email']);
      

        // * create permissions for register user
        Permission::create(['name' => 'register users']);

        // * Roles
        
        // * - Admin
        Role::create(['name' => 'admin'])->givePermissionTo(
            [
               'register users'
                
            ]
        );

        // * - Users
        Role::create(['name' => 'users'])->givePermissionTo(
            [
                'send email'
            ]
        );
       

    }
}
