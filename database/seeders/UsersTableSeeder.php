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
                'first_name' => "Matías",
                "last_name" => "García",
                "gender" => "H",
                "admin" => "1",
                "email" => "admin@liftup.es",
                "password" => bcrypt("admin"),
            ],
            [
                'first_name' => "user",
                "last_name" => "user",
                "gender" => "H",
                "admin" => "0",
                "email" => "user@gmail.com",
                "password" => bcrypt("123456"),
            ]
        ]);
    }
}
