<?php

namespace Tests\Feature\API;

use App\Models\User;
use App\Policies\PermissionNames;
use App\Policies\RoleNames;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_fetch_articles_from_api_successfully()
    {

        $response = $this->getJson('/api/articles');

        $response->assertStatus(200);
    }

}
