<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            'name' =>'oppo',
            'price' =>'100000',
            'category_id' =>1,
            'image' => 'https://vn-live-01.slatic.net/p/9adcf26e27973cf67a305728abaf8176.jpg',
            'description' =>'đẹp',
        ],
            [
            'name' =>'iphone',
            'price' =>'150000',
            'category_id' =>1,
            'image' => 'https://vn-live-01.slatic.net/p/9adcf26e27973cf67a305728abaf8176.jpg',
            'description' =>'xấu',
            ]
        );
    }
}
