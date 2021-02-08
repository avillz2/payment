<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //   // Reset cached roles and permissions
        //   app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //   // create permissions
        //   Permission::create(['name' => 'edit']);
        //   Permission::create(['name' => 'delete']);
        //   Permission::create(['name' => 'publish']);
        //   Permission::create(['name' => 'unpost']);



        //   DB::table('users')->insert([
        //     'name' => 'tom',
        //     'email' => 'tom@gmail.com',
        //     'password' => 'password',
        //   ])

    }
}
