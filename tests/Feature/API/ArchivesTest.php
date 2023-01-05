<?php

namespace Tests\Feature\API;

use App\Models\Journee;
use Database\Seeders\ParutionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ArchivesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_fetch_archives_from_api_successfully()
    {
        $response = $this->getJson('/api/journees');
        $response->assertOk();

    }

}
