<?php

namespace Tests\Feature\API;

use App\Models\Journee;
use App\Models\User;
use App\Policies\PermissionNames;
use Database\Seeders\ParutionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
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

        $this->seed(ParutionSeeder::class);
        $journee = Journee::where("date_parutions","=", today())->first();
        $this->assertNotNull($journee);
        $this->assertTrue($journee->parutions->count() == 10);
        $response = $this->getJson('/api/parutions/'.today()->format("Y-m-d"));
        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {
            $json->has(10)
                ->first(function ($json) {
                    $json->has('image_la_une')
                        ->has('id')
                        ->has('achete')
                        ->has('journal')
                        ->has('prix')
                        ->etc();
                    $json->where('achete', false);
                });
        });
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
