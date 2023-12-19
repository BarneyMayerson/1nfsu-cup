<?php

use App\Models\User;

test("user profile page can be rendered", function () {
    $user = User::factory()->create([
        "name" => "John Doe",
    ]);

    $this->get("profile/{$user->name}")->assertOk();
});
