<?php

use App\Models\User;

test("user can delete own account", function () {
    $user = User::factory()->create();
    $this->signIn($user);

    $attributes = [
        "email" => $user->email,
        "phrase" => "delete my account right now",
    ];

    $this->delete("settings/account", $attributes);

    $this->assertSoftDeleted($user);
});
