<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = new User();
        $item->name = "Toàn";
        $item->email = "toan@gmail.com";
        $item->password = Hash::make('123456');
        $item->address = 'Quảng Trị';
        $item->group_id ='1';
        $item->save();
    }
}