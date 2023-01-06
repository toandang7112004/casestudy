<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' =>'admin',
            'display_name' =>'Quản Trị hệ thống'
        ]);
        DB::table('roles')->insert([
            'name' =>'guest',
            'display_name' =>'Khách hàng'
        ]);
        DB::table('roles')->insert([
            'name' =>'developer',
            'display_name' =>'Phát triển hệ thống'
        ]);
        DB::table('roles')->insert([
            'name' =>'content',
            'display_name' =>'chỉnh sửa nội dung'
        ]);
    }
}
