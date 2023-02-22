<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
   
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        $permissions = [
            
            ['guard_name' => 'web', 'name' => 'users'],
            ['guard_name' => 'web', 'name' => 'add user'],
            ['guard_name' => 'web', 'name' => 'edit user'],
            ['guard_name' => 'web', 'name' => 'show user'],
            ['guard_name' => 'web', 'name' => 'delete user'],
            ['guard_name' => 'web', 'name' => 'roles'],
            ['guard_name' => 'web', 'name' => 'add role'],
            ['guard_name' => 'web', 'name' => 'edit role'],
            ['guard_name' => 'web', 'name' => 'show role'],
            ['guard_name' => 'web', 'name' => 'delete role'],
            ['guard_name' => 'web', 'name' => 'add-permission'],
            ['guard_name' => 'web', 'name' => 'services'],
            ['guard_name' => 'web', 'name' => 'add service'],
            ['guard_name' => 'web', 'name' => 'edit service'],
            ['guard_name' => 'web', 'name' => 'delete service'],
            ['guard_name' => 'web', 'name' => 'show service'],
            ['guard_name' => 'web', 'name' => 'admins'],
            ['guard_name' => 'web', 'name' => 'add admin'],
            ['guard_name' => 'web', 'name' => 'edit admin'],
            ['guard_name' => 'web', 'name' => 'delete admin'],
        ];

        $Admin_role = Role::create([

            'name' => 'super_admin'
        ]);

        $user = User::create([

            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type' =>User::ADMIN,
            'type_ar' => 'مسؤول التطبيق',
            'type_en' => 'admin',
            'email_verified_at' => now(),
        ]);
        Permission::insert($permissions);
        $Admin_role->syncPermissions(Permission::all());
        $user->assignRole($Admin_role);
    }
}
