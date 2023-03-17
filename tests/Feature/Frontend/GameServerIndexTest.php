<?php

namespace Tests\Feature\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameServerIndexTest extends TestCase
{
    /** @test */
    function game_server_index_page_can_be_rendered(): void
    {
        $response = $this->get("/game-server");

        $response->assertStatus(200);
    }
}
