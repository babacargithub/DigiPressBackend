<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JourneeCrudControllerTest extends TestCase
{
    use RefreshDatabase;
    use BaseAdminTest;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_journee_can_be_created(){
        $user = $this->getSuperAdminUser();
        $response = $this->actingAs($user)->post(backpack_url("journee"),["date_parutions"=>today()]);
        $response->assertRedirect(backpack_url("journee"));
    }
    public function test_duplicate_journee_cannot_be_created(){
        $user = $this->getSuperAdminUser();
        $response = $this->actingAs($user)->post(backpack_url("journee"),["date_parutions"=>today()]);
        $response->assertRedirect(backpack_url("journee"));

        $response = $this->actingAs($user)->post(backpack_url("journee"),["date_parutions"=>today()]);
        $response->assertInvalid();
    }

}
