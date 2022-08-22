<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /** @var \Spatie\Permission\Models\Role */
    private $roles;

    /** @var \Spatie\Permission\Models\Permission */
    private $permissions;

    public function __construct()
    {
        $this->roles = Role::get();
        $this->permissions = Permission::get();
    }

    public function run()
    {
        /** @var \App\Models\User $user */
        $user = [
            'email' => 'web.developers.rus@gmail.com',
            'password' => Hash::make('password'),
        ];

        $user = User::create($user);

        $user->assignRole('admin');
    }
}
