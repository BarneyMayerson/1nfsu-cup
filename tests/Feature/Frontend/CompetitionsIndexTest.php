<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

test('competitions index page can be rendered', function () {
    $response = $this->get("/competitions");

    $response->assertStatus(200);
});
