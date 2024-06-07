<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'company-list',
            'company-show',
            'company-create',
            'company-edit',
            'company-delete',
            'intern-list',
            'intern-create',
            'intern-edit',
            'intern-delete',
            'intern-show',
            'supervisor-list',
            'supervisor-create',
            'supervisor-edit',
            'supervisor-delete',
            'evaluation-list',
            'evaluation-show',
            'evaluation-create',
            'evaluation-edit',
            'evaluation-delete',
            'report-list',
            'report-create',
            'report-edit',
            'report-delete',
            'report-show',
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
