<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

test('game server index page can be rendered', function () {
    $response = $this->get("/game-server");

    $response->assertStatus(200);
});
