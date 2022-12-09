<?php

namespace Tests\Feature\API;

use App\Models\User;
use App\Policies\PermissionNames;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParutionsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_we_user_can_fetch_parutions_from_api_successfully()
    {
        $response = $this->getJson('/api/parutions/'.today()->format("Y-m-d"));

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_cannot_buy_parutions_with_bad_request()
    {
        $response = $this->postJson('/api/payer');
        $response->assertStatus(500);
    }

}
