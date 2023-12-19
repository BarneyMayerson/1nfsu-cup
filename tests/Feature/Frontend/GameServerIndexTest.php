<?php

test("game server index page can be rendered", function () {
    $response = $this->get("/game-server");

    $response->assertStatus(200);
});
