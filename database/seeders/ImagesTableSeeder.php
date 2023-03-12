<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'idClo' => 101,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/ApexSsT-ShirtFireflyGreen-White-A3A7T-EBK5-2127.221_0edc34c4-0086-46c5-91f2-c3af5e7089e4_885x.jpg?v=1676993128",
            ],
            [
                'idClo' => 101,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/ApexSsT-ShirtFireflyGreen-White-A3A7T-EBK5-2162.224_dd0d8e43-539c-473d-8cdb-62e61bab422c_438x.jpg?v=1676993128",
            ],
            [
                'idClo' => 101,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/ApexSsT-ShirtFireflyGreen-White-A3A7T-EBK5-2165.225_101138a7-8162-46d5-b136-65fa317105c6_438x.jpg?v=1676993128",
            ],
            [
                'idClo' => 102,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/PowerT-ShirtEveningBlue-A2A1X-UBZF-2361.515_9b051afd-5569-4912-b5a4-73b3054ff34b_438x.jpg?v=1676993140",
            ],
            [
                'idClo' => 102,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/PowerT-ShirtEveningBlueA2A1X-UBZF-2406.516_dda9ee65-0620-4a43-9c3d-374c88d94e20_438x.jpg?v=1676993140",
            ],
            [
                'idClo' => 102,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/PowerT-ShirtEveningBlue-A2A1X-UBZF-2401.190_93d4a4aa-78f7-48d1-99a1-3033b151e292_290x.jpg?v=1676993140",
            ],
            [
                'idClo' => 102,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/PowerT-ShirtEveningBlue-A2A1X-UBZF-2408.192_b9d43252-8b83-4b66-b1b6-1c05437dcfd0_290x.jpg?v=1676993140",
            ],
            [
                'idClo' => 103,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/RESTDAYSWEATSCROPPULLOVER-BlackCoreMarlB3A9W-BBBC.A_885x.jpg?v=1660211850",
            ],
            [
                'idClo' => 103,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/RESTDAYSWEATSCROPPULLOVER-BlackCoreMarlB3A9W-BBBC.D3_438x.jpg?v=1660211851",
            ],
            [
                'idClo' => 103,
                'url' => "https://cdn.shopify.com/s/files/1/1367/5207/products/RESTDAYSWEATSCROPPULLOVER-BlackCoreMarlB3A9W-BBBC.D1_290x.jpg?v=1660211851",
            ],
        ]);
    }
}
