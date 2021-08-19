<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $user = User::create([
            'name' => 'Maxime',
            'lastname' => 'Gindre',
            'email' => 'gindre.maxime@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mg261181'), // password
            'slug' => 'maxime-gindre',
            'user_group' => 'admin',
            'authorized' => 1,
            'remember_token' => Str::random(10),
        ]);

        $user->roles()->attach(2);
    }
}
