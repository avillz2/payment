<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
          // Reset cached roles and permissions
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions
          Permission::create(['name' => 'edit','removable'=> 0]);
          Permission::create(['name' => 'delete']);
          Permission::create(['name' => 'publish']);
          Permission::create(['name' => 'unpost']);

          // create roles and assign created permissions

          // this can be done as separate statements
          $role = Role::create(['name' => 'managers','removable'=> 0]);
          $role->givePermissionTo('edit');

            // create roles and assign created permissions

           $user = User::create(['name' => 'tom','email' => 'tom@gmail.com','phone' => '0805667777','password' => Hash::make('12345678'),'removable'=> 0]);
           $user->assignRole('managers');

    }
}
