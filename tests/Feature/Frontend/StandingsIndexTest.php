<?php

namespace Tests\Feature\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StandingsIndexTest extends TestCase
{
    /** @test */
    function standings_index_page_can_be_rendered(): void
    {
        $response = $this->get("/standings");

        $response->assertStatus(200);
    }
}
