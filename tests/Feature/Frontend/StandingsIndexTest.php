<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

test('standings index page can be rendered', function () {
    $response = $this->get("/standings");

    $response->assertStatus(200);
});
