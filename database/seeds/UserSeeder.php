<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([ 'role' => 'superadmin']);
        \App\Role::create([ 'role' => 'store_manager']);
        \App\Role::create([ 'role' => 'user']);


        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => '1',
            'user_type' => 'superadmin',
        ]);

        \App\User::create([
            'name' => 'testmanager',
            'email' => 'testmanager@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => '2',
            'user_type' => 'store_manager',
        ]);

        \App\User::create([
            'name' => 'Store manager',
            'email' => 'storemanager@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => '2',
            'user_type' => 'store_manager',
        ]);

        \App\User::create([
            'name' => 'testuser',
            'email' => 'testuser@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => '3',
            'user_type' => 'user',
        ]);

        \App\User::create([
            'name' => 'demouser',
            'email' => 'demouser@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => '3',
            'user_type' => 'user',
        ]);
    }
}
