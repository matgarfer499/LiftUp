<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClothesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clothes')->insert([
            [
                'type_product' => "camiseta",
                'name' => "Apex",
                'gender' => "H",
                'discount' => 0,
                'discount_rate' => 25,
                'price' => 25,
                'description' => "- Slim fit
            - Lightweight, high-stretch material
            - Breathable fabric
            - Sweat-wicking
            - Side splits at hem for functionality and movement
            - Bonded tape for design details
            - ESNCE™️ anti-odour technology
            - 91% Polyester, 9% IONIC+®
            - Model is 6'0 and wears size M
            - SKU: A3A7T-EBK5"
            ],
            [
                'type_product' => "camiseta",
                'name' => "Power",
                'gender' => "H",
                'discount' => 1,
                'discount_rate' => 20,
                'price' => 35,
                'description' => "Lifting is the pursuit of failure. Fail hard. Fail fast. Fail with gusto. Fail with pride. Fail together. Until one day, you don't. The Power collection is made to fail with you, time and time again. Durable fabrics support you through every lift, while ribbed detailing gives you the freedom to flex and move without distractions. The Power collection. With you until failure."
            ],
            [
                'type_product' => "Oversized",
                'name' => "REST DAY SWEATS CROPPED PULLOVER",
                'gender' => "M",
                'discount' => 0,
                'discount_rate' => 20,
                'price' => 42.99,
                'description' => "Rest up in Rest Day Sweats. This versatile collection is designed with our thickest, heaviest fabric yet so you can feel the difference when you wear it. The clean aesthetic makes it the next staple look in your wardrobe. Wear your Rest Day Sweats to and from the gym, to warm up, or just about anywhere on your next rest day."
            ],

        ]);
    }
}
