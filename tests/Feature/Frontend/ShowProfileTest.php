<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user profile page can be rendered', function () {
    $user = User::factory()->create([
        "name" => "John Doe",
    ]);

    $this->get("profile/{$user->name}")->assertOk();
});
