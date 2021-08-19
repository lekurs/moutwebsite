<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        DB::table('permissions_roles')->truncate();
//        DB::table('roles_users')->truncate();
//        DB::table('roles')->truncate();
//        DB::table('permissions')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        foreach (config('roles.roles') as $role) {
            $created = Role::create([
                'name' => $role['name'],
                'slug' => $role['slug'],
                'description' => $role['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $permissions = Permission::query()->whereIn('key', $role['permissions'])->get();
            $created->permissions()->attach($permissions);
        }
    }
}
