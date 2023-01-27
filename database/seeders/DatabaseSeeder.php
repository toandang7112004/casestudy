<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->importGroups();
        $this->importRoles();
        $this->importRoles1();
        $this->importRole();
        $this->importGroupRole();
    }
    public function importRoles() 
    {
        $groups = ['Category','Product'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','viewtrash'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRoles1() 
    {
        $groups = ['User','Group'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRole()
    {
        $groups = ['Customer', 'Order'];
        $actions = ['viewAny', 'view'];
        foreach ($groups as $group) {   
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importGroupRole()
    {
        for ($i = 1; $i <= 30; $i++) {
            DB::table('group_role')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importGroups()
    {
        $userGroup = new Group();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }
}
