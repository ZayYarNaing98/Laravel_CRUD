<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'SuperAdmin']);
        $editor = Role::create(['name' => 'Editor']);

        $dashboard = Permission::create(['name' => 'dashboard']);
        $widget = Permission::create(['name' => 'widget']);

        $blog_list = Permission::create(['name' => 'blogList']);
        $blog_create = Permission::create(['name' => 'blogCreate']);
        $blog_edit = Permission::create(['name' => 'blogEdit']);
        $blog_delete = Permission::create(['name' => 'blogDelete']);
        $blog_show = Permission::create(['name' => 'blogShow']);

        $permission_list = Permission::create(['name' => 'permissionList']);
        $permission_create = Permission::create(['name' => 'permissionCreate']);
        $permission_edit = Permission::create(['name' => 'permissionEdit']);
        $permission_delete = Permission::create(['name' => 'permissionDelete']);

        $user_list = Permission::create(['name' => 'userList']);
        $user_create = Permission::create(['name' => 'userCreate']);
        $user_edit = Permission::create(['name' => 'userEdit']);
        $user_delete = Permission::create(['name' => 'userDelete']);
        $user_show = Permission::create(['name' => 'userShow']);




        $super_admin->givePermissionTo([
            $dashboard, $widget,
            $blog_list, $blog_create, $blog_edit, $blog_delete, $blog_show,
            $permission_list, $permission_create, $permission_edit, $permission_delete,
            $user_list, $user_create, $user_edit, $user_delete,
        ]);


        $editor->givePermissionTo([
            $blog_list, $blog_create, $blog_edit, $blog_show,
            $permission_list, $permission_create, $permission_edit,
        ]);
    }
}
