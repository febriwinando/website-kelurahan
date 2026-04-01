<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'level' => 'administrator',
                'fcm_token' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Admin',
                'email' => 'febriwinando@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'level' => 'administrator',
                'fcm_token' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'fannyliyani6@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'level' => 'admin',
                'fcm_token' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Ketua',
                'email' => 'ketua@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'level' => 'ketua',
                'fcm_token' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Kepling 1',
                'email' => 'nando.purba3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'level' => 'kepling',
                'fcm_token' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
