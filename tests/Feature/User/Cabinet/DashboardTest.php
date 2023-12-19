<?php

test("guest cannot visit cabinet page", function () {
    $this->get("/cabinet")->assertRedirect("/login");
});

test("authenticated user can visit cabinet page", function () {
    $this->signIn();

    $this->get("/cabinet")->assertOk();
});
