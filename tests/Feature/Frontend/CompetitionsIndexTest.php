<?php

namespace Tests\Feature\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompetitionsIndexTest extends TestCase
{
    /** @test */
    function competitions_index_page_can_be_rendered(): void
    {
        $response = $this->get("/competitions");

        $response->assertStatus(200);
    }
}
