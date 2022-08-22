<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    private $roles;

    /** @var \Illuminate\Database\Eloquent\Collection */
    private $permissions;

    public function run()
    {
        $roles = [
            'admin', 'user',
        ];

        $permissions = [
            // Media
            'media.create', 'media.update', 'media.delete',
            // Franchises
            'franchise.create', 'franchise.update', 'franchise.delete',
            // Presets
            'preset.create', 'preset.update', 'preset.delete',
        ];

        $this->create($roles, $permissions);

        // Adding all permissions for admin
        $this->roles->firstWhere('name', $roles[0])->syncPermissions($this->permissions);
    }

    /**
     * Create Roles and Permissions
     * 
     * @param  string[] $roles
     * @param  string[] $permissions
     * @return void
     */
    private function create(array $roles, array $permissions)
    {
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }
}
