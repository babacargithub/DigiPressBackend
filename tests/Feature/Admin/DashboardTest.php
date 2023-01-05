<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Policies\PermissionNames;
use App\Policies\RoleNames;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    use BaseAdminTest;

    public function test_admin_area_cannot_be_accessed_without_login()
    {

        $response = $this->get(backpack_url("journee"));
        $response->assertRedirect(backpack_url("login"));
    }
    public function test_create_journees_screen_can_be_rendered()
    {
       $user = $this->getSuperAdminUser();
        $this->actingAs($user,"web");
        $response = $this->get("/admin/journee/create");
        $response->assertOk();
    }
    public function test_admin_area_is_denied_to_non_admin_users()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $role = Role::create(["name"=>RoleNames::ROLE_PARTNER]);

        $user->assignRole($role);
        $user->save();
        $this->actingAs($user,"web");
        $response = $this->get(backpack_url("/"));
        $response->assertStatus(403);
    }
}
