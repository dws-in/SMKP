<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        $organizer_permissions = $admin_permissions->filter(function ($permission) {
            return (substr($permission->title, 0, 6) != 'users_') && (substr($permission->title, 0, 10) != 'mytryouts_');
        });
        $participant_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title,  0, 6) != 'users_';
        });
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        Role::findOrFail(2)->permissions()->sync($organizer_permissions->pluck('id'));
        Role::findOrFail(3)->permissions()->sync($participant_permissions->pluck('id'));
    }
}
