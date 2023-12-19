<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user can delete own account', function () {
    $user = User::factory()->create();
    $this->signIn($user);

    $attributes = [
        "email" => $user->email,
        "phrase" => "delete my account right now",
    ];

    $this->delete("settings/account", $attributes);

    $this->assertSoftDeleted($user);
});
