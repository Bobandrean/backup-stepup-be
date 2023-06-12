<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Assuming your User model is located in the "App\Models" namespace
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

        $password = Hash::make('User_1234');

        User::updateOrCreate([
            "id" => 1,
            "name" => "Amir Abidin",
            "email" => "73001162@fake.com",
            "moodle_id" => 4,
            "username" => "73001162",
            "division" => null,
            "active" => "0",
            "function" => null,
            "position" => "Regional Head - Kalimantan & Sulawesi",
            "sub_area" => "UOB Plaza",
            "area" => "Jakarta Pusat",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:28:01",
            "updated_at" => "2023-06-09 10:36:15",
            "cfh" => 0
        ]);
        User::updateOrCreate([
            "id" => 2,
            "name" => "Sri Malawati",
            "email" => "73001419@fake.com",
            "moodle_id" => 5,
            "username" => "73001419",
            "division" => null,
            "active" => "0",
            "function" => null,
            "position" => "Business Manager",
            "sub_area" => "Tajur",
            "area" => "Bogor",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:28:01",
            "updated_at" => "2023-06-09 10:36:15",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 3,
            "name" => "Admin Tester",
            "email" => "gunariah.sholeha@centrinova.co.id",
            "moodle_id" => 6,
            "username" => "admin2",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:28:01",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        // Add other users here using the same format

        // Example:
        User::updateOrCreate([
            "id" => 4,
            "name" => "Dwi Forger",
            "email" => "duplicated.gunariah.sholeha@centrinova.co.id",
            "moodle_id" => 7,
            "username" => "0001",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:32:06",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 1
        ]);

        User::updateOrCreate([
            "id" => 6,
            "name" => "Hubertus Bernard",
            "email" => "0002@fake.com",
            "moodle_id" => 8,
            "username" => "0002",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 7,
            "name" => "Riko Pujianto",
            "email" => "0003@fake.com",
            "moodle_id" => 9,
            "username" => "0003",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 8,
            "name" => "Fitri Anastasia",
            "email" => "0004@fake.com",
            "moodle_id" => 10,
            "username" => "0004",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 9,
            "name" => "Nita Yuanita",
            "email" => "0005@fake.com",
            "moodle_id" => 11,
            "username" => "0005",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 10,
            "name" => "Budi Muliono",
            "email" => "0006@fake.com",
            "moodle_id" => 12,
            "username" => "0006",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 11,
            "name" => "Rian Gunawan",
            "email" => "0007@fake.com",
            "moodle_id" => 13,
            "username" => "0007",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 12,
            "name" => "Lisa Orliana",
            "email" => "0008@fake.com",
            "moodle_id" => 14,
            "username" => "0008",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 13,
            "name" => "Crono Claus",
            "email" => "0009@fake.com",
            "moodle_id" => 15,
            "username" => "0009",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:16",
            "updated_at" => "2023-06-09 10:36:16",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 14,
            "name" => "Wulansari .",
            "email" => "00020@fake.com",
            "moodle_id" => 16,
            "username" => "00020",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 15,
            "name" => "Syarif .",
            "email" => "ultraa@fake.com",
            "moodle_id" => 17,
            "username" => "ultraa",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 16,
            "name" => "Jeremy .",
            "email" => "ultram@fake.com",
            "moodle_id" => 18,
            "username" => "ultram",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 17,
            "name" => "Hamdanik",
            "email" => "ultrat@fake.com",
            "moodle_id" => 19,
            "username" => "ultrat",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 18,
            "name" => "Angga . ",
            "email" => "ultraq@fake.com",
            "moodle_id" => 20,
            "username" => "ultraq",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 19,
            "name" => "Gunariah S",
            "email" => "ultrags@fake.com",
            "moodle_id" => 21,
            "username" => "ultrags",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 20,
            "name" => "Riky Syahputra",
            "email" => "hrultra1@fake.com",
            "moodle_id" => 22,
            "username" => "hrultra1",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 1
        ]);

        User::updateOrCreate([
            "id" => 20,
            "name" => "Riky Syahputra",
            "email" => "hrultra1@fake.com",
            "moodle_id" => 22,
            "username" => "hrultra1",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 1
        ]);

        User::updateOrCreate([
            "id" => 21,
            "name" => "Satrio .",
            "email" => "hrultra2@fake.com",
            "moodle_id" => 23,
            "username" => "hrultra2",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 22,
            "name" => "Michael .",
            "email" => "dev1@fake.com",
            "moodle_id" => 24,
            "username" => "dev1",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 23,
            "name" => "Kevin .",
            "email" => "dev2@fake.com",
            "moodle_id" => 25,
            "username" => "dev2",
            "division" => "Ultra",
            "active" => "1",
            "function" => "Ultra",
            "position" => "Staff",
            "sub_area" => "Ultra",
            "area" => "Ultra",
            "board_of_director" => null,
            "role_id" => null,
            "suspender" => null,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-09 10:36:19",
            "updated_at" => "2023-06-09 10:36:19",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 24,
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "moodle_id" => null,
            "username" => "Admin",
            "division" => "Administration",
            "active" => "1",
            "function" => "Administrator",
            "position" => null,
            "sub_area" => null,
            "area" => null,
            "board_of_director" => null,
            "role_id" => "1",
            "suspender" => 0,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-12 00:49:59",
            "updated_at" => "2023-06-12 00:49:59",
            "cfh" => 0
        ]);

        User::updateOrCreate([
            "id" => 25,
            "name" => "John Doe",
            "email" => "john@example.com",
            "moodle_id" => null,
            "username" => "johndoe",
            "division" => "Sales",
            "active" => "1",
            "function" => "Sales Representative",
            "position" => null,
            "sub_area" => null,
            "area" => null,
            "board_of_director" => null,
            "role_id" => "2",
            "suspender" => 0,
            "email_verified_at" => null,
            "password" => $password,
            "remember_token" => null,
            "created_at" => "2023-06-12 00:50:00",
            "updated_at" => "2023-06-12 00:50:00",
            "cfh" => 0
        ]);
    }
}
