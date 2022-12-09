<?php

namespace Tests\Feature\API;

use App\Models\User;
use App\Policies\PermissionNames;
use App\Policies\RoleNames;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThemesTest
    extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_fetch_themes_from_api_successfully()
    {

        $response = $this->getJson('/api/themes');

        $response->assertStatus(200);
    }

}
