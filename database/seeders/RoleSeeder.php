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
        $groups = ['Category', 'Group','Product', 'User' ,'Comment'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'deleteforever'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,
                ]);
            }
        }
        DB::table('roles')->insert(
            [
                'name' => 'User_adminupdatepass',
                'group_name' => 'User'

            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'Customer_viewAny',
                'group_name' => 'Customer'

            ]
        );

        $group = ['Category', 'Group', 'Product'];
        foreach ($group as $groups) {
            DB::table('roles')->insert([
                'name' => $groups . '_viewTrash',
                'group_name' => $groups,
            ]);
        }
    }
}
