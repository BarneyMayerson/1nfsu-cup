<?php

namespace Tests\Feature\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TourneysIndexTest extends TestCase
{
    /** @test */
    function tourneys_index_page_can_be_rendered(): void
    {
        $response = $this->get("/tourneys");

        $response->assertStatus(200);
    }
}
