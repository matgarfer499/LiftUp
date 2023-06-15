<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'profile_picture' => 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png', 
                'first_name' => "Matías",
                "last_name" => "García",
                "admin" => "1",
                "email" => "admin@liftup.es",
                "password" => bcrypt("admin"),
            ],
            [
                'profile_picture' => 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png',
                'first_name' => "user",
                "last_name" => "user",
                "admin" => "0",
                "email" => "user@gmail.com",
                "password" => bcrypt("123456"),
            ]
        ]);
    }
}
