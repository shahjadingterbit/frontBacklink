<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;


    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_permissions',
            'add_permissions',
            'edit_permissions',
            'delete_permissions',

            'view_domains',
            'add_domains',
            'edit_domains',
            'delete_domains',

            'view_project_logs',
            'add_project_logs',
            'edit_project_logs',
            'delete_project_logs',

            'view_groups',
            'add_groups',
            'edit_groups',
            'delete_groups',

            'view_locations',
            'add_locations',
            'edit_locations',
            'delete_locations',
        ];
    }
}
