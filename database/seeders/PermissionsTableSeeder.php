<?php

namespace Database\Seeders;
use App\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'name'      => 'group-lists',
                'guard_name'      => 'web',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => '2',
                'name'      => 'edit-group',
                'guard_name'      => 'web',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => '3',
                'name'      => 'delete-group',
                'guard_name'      => 'web',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],
            [
                'id'         => '4',
                'name'      => 'add-group',
                'guard_name'      => 'web',
                'created_at' => '2019-09-15 06:10:05',
                'updated_at' => '2019-09-15 06:10:05',
            ],

        ];

        Permission::insert($permissions);
    }
}
