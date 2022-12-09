<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Policies\PermissionNames;
use App\Policies\RoleNames;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    use BaseAdminTest;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(403);
    }
    public function test_admin_area_cannot_be_accessed_without_login()
    {

        $response = $this->get(backpack_url("journee"));
        $response->assertStatus(403);
    }
    public function test_create_journees_form_can_be_rendered()
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
        $response->assertStatus(302);
    }
}
