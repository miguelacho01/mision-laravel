<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create video_club']);
        Permission::create(['name' => 'read video_club']);
        Permission::create(['name' => 'update video_club']);
        Permission::create(['name' => 'delete video_club']);



        $roleAdmin = Role::create(['name' => 'admin']);
        $roleCashier = Role::create(['name' => 'cliente']);

        $roleAdmin->givePermissionTo([
            'create video_club',
            'read video_club',
            'update video_club',
            'delete video_club',
           
        ]);

        $roleCashier->givePermissionTo([
            'read video_club',
        ]);
    }
}
