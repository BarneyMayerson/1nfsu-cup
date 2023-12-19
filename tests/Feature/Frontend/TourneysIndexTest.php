<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

test('tourneys index page can be rendered', function () {
    $response = $this->get("/tourneys");

    $response->assertStatus(200);
});
