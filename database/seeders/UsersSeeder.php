<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),])
            ->each(function ($user) {
                $user->assignRole('Admin');
            });

        User::create([
            'name' => 'employee',
            'email' => 'employee@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),])
            ->each(function ($user) {
                $user->assignRole('employee');
            });

        User::create([
            'name' => 'client',
            'email' => 'client@client.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),])
            ->each(function ($user) {
                $user->assignRole('client');
            });




    }
}
