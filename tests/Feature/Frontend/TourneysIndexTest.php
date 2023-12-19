<?php

test("tourneys index page can be rendered", function () {
    $response = $this->get("/tourneys");

    $response->assertStatus(200);
});
