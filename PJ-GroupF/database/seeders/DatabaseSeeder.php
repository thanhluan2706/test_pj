<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'manu_id' => '1',
                'name' => 'Mozard BT100 Speaker Black',
                'price' => '895000',
                'image' => 'Mozard.png',
                'description' => 'Mozard BT100 Bluetooth Speaker Black
                Solid design, elegant black color
                The Mozard BT100 Bluetooth speaker has a simple design, curved corners embrace the speaker body for a complete design, uses fabric to filter the sound and is covered with leather around to avoid fingerprints. Small Bluetooth speaker form , easy to carry to listen to music for more interesting and exciting trips. 
                The device uses electricity directly , no need to care about the issue of running out of battery, as long as there is a power source, you can connect and use it right away',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ],
            [
                'manu_id' => '1',
                'name' => 'iPhone 14 Pro Max',
                'price' => '32390000',
                'image' => 'ip141tb.png',
                'description' => 'Màn hình: OLED6.7"Super Retina XDR#Hệ điều hành: iOS 15#Camera sau: 3 camera 12 MP#Camera trước: 12 MP#Chip: Apple A15 Bionic#RAM: 6 GB#Bộ nhớ trong: 128 GB#SIM:1 Nano SIM & 1 eSIM Hỗ trợ 5G#Pin, Sạc: 4352 mAh, 20 W',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ],
            [
                'manu_id' => '1',
                'name' => 'Apple Watch Series 7 GPS 41mm',
                'price' => '8153000',
                'image' => 'Apple Watch Series 7 GPS 41mm.png',
                'description' => 'Màn hình: OLED6.7"Super Retina XDR#Hệ điều hành: iOS 15#Camera sau: 3 camera 12 MP#Camera trước: 12 MP#Chip: Apple A15 Bionic#RAM: 6 GB#Bộ nhớ trong: 128 GB#SIM:1 Nano SIM & 1 eSIM Hỗ trợ 5G#Pin, Sạc: 4352 mAh, 20 W',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ],
            [
                'manu_id' => '1',
                'name' => 'Mozard BT100 Speaker Black',
                'price' => '895000',
                'image' => 'Mozard.png',
                'description' => 'Mozard BT100 Bluetooth Speaker Black
                Solid design, elegant black color
                The Mozard BT100 Bluetooth speaker has a simple design, curved corners embrace the speaker body for a complete design, uses fabric to filter the sound and is covered with leather around to avoid fingerprints. Small Bluetooth speaker form , easy to carry to listen to music for more interesting and exciting trips. 
                
                The device uses electricity directly , no need to care about the issue of running out of battery, as long as there is a power source, you can connect and use it right away',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ],
            [
                'manu_id' => '1',
                'name' => 'Laptop Gaming Acer Nitro 5 AN515-45-R6EV Geforce GTX 1650 4GB AMD R5 5600H 8GB 512GB 15.6',
                'price' => '19490000',
                'image' => 'acer-nitro5-AN515-45-R6EV.png',
                'description' => '                                Laptop Gaming Acer Nitro 5 AN515-45-R6EV Geforce GTX 1650 4GB AMD R5 5600H 8GB 512GB 15.6 144Hz IPS 4-zones Win 11
                Acer Nitro 5 AN515-45-R6EV integrates the latest "weapons". Including CPU R5 5600H, VGA GTX 1650 for powerful processing performance.
                Acer Nitro 5 AN515-45-R6EV has an impressive design with two main black-red colors. The surface is designed to be more aggressive and angular. Currently the typical fighting style of the Nitro series. The 6.3mm ultra-thin screen border gives a feeling of more open space than before.                            ',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ],
            [
                'manu_id' => '1',
                'name' => 'LMacBook Pro 16 M1 Max',
                'price' => '82990000',
                'image' => 'Macbook168tr.png',
                'description' => 'Laptop Apple MacBook Pro 16 M1 Max 2021 10 core-CPU/32GB/1TB SSD/32 core-GPU (MK1A3SA/A) 
                Impressive with the  Apple MacBook Pro 16 M1 Max 2021 wearing a unique "new suit", attracting all eyes with the notch screen that first appeared in the Mac line and hidden inside is a powerful configuration set. great from the advanced M1 Max chip.',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ],
            [
                'manu_id' => '1',
                'name' => 'Xiaomi 12T 128GB',
                'price' => '12900000',
                'image' => 'Xiaomi12T.png',
                'description' => 'Finally, Xiaomi 12T 256GB has also launched with a break in features when equipped with a new generation high-end chip from MediaTek, promising to be a device that serves well for gaming or handling tasks. High-quality graphics. In addition, the phone has been upgraded with a quality camera-like screen to meet all your usage needs.',
                'feature' => '1',
                'created_at' => '2023-02-02',
            ]
        ]);
    }
}
