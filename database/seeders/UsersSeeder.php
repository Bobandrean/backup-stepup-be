<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin_1234'),
            'username' => 'Admin',
            'division' => 'Administration',
            'active' => '1',
            'function' => 'Administrator',
            'role_id' => '1',
            'suspender' => 0,
        ]);

        // Add regular users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('User_1234'),
            'username' => 'johndoe',
            'division' => 'Sales',
            'active' => '1',
            'function' => 'Sales Representative',
            'role_id' => '2',
            'suspender' => 0,
        ]);

        // Add more users as needed
    }
}
