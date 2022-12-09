<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Policies\PermissionNames;
use App\Policies\RoleNames;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PhpParser\Builder\Trait_;
use Tests\TestCase;

Trait BaseAdminTest
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function getSuperAdminUser() : User{
        /** @var User $user */
        $user = User::factory()->create();
        $role = Role::create(["name"=>RoleNames::ROLE_SUPER_ADMIN]);
        $permission = Permission::create(["name"=>PermissionNames::ACCESS_SUPER_ADMIN_AREA]);

        $user->assignRole($role);
        $user->givePermissionTo(PermissionNames::ACCESS_SUPER_ADMIN_AREA);
        $user->save();

        return $user;
    }/**
     * A basic feature test example.
     *
     * @return void
     */
    public function getAdminUser() : User{
        /** @var User $user */
        $user = User::factory()->create();
        $role = Role::create(["name"=>RoleNames::ROLE_ADMIN]);
        $permission = Permission::create(["name"=>PermissionNames::ACCESS_ADMIN_AREA]);

        $user->assignRole($role);
        $user->givePermissionTo(PermissionNames::ACCESS_ADMIN_AREA);
        $user->save();

        return $user;
    }

}
