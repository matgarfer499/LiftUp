<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Poblacion de datos de las tablas clothes, color y size
        \App\Models\Clothe::factory(100)->create();
        $this->call(ClothesTableSeeder::class);
        \App\Models\Color::factory(15)->create();
        \App\Models\Size::factory(7)->create();

        //Para las tablas mucho a mucho
        $clothes = \App\Models\Clothe::all();
        $colors = \App\Models\Color::all();
        $sizes = \App\Models\Size::all();

        foreach($clothes as $clothe){
            foreach($colors as $color){
                if(rand(0,1)==1){
                    $clothe->clothingColor()->attach($color);
                }
            }
        }
        
        foreach($clothes as $clothe){
            foreach($sizes as $size){
                if(rand(0,1)==1){
                    $clothe->clothingSize()->attach($size, ['stock' => rand(0,50)]);
                }
            }
        }
        
        \App\Models\Image::factory(60)->create();
        $this->call(ImagesTableSeeder::class);
        \App\Models\User::factory(60)->create();
        $this->call(UsersTableSeeder::class);
        \App\Models\Review::factory(100)->create();
        
        $users = \App\Models\User::all();
        
       
        
        foreach($clothes as $clothe){
            foreach($users as $user){
                if(rand(0,1)==1){
                    $clothe->wishlist()->attach($user, ['like' => rand(0, 1)]);
                }
            }
        }

        foreach($clothes as $clothe){
            foreach($users as $user){
                if(rand(0,1)==1){
                    $clothe->purchase()->attach($user, ['purchased' => rand(0, 1)]);
                }
            }
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
