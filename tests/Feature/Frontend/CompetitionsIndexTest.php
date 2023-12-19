<?php

test("competitions index page can be rendered", function () {
    $response = $this->get("/competitions");

    $response->assertStatus(200);
});
