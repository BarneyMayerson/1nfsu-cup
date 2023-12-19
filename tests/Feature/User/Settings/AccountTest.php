<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guest cannot visit account page', function () {
    $this->get("settings/account")->assertRedirect("login");
});

test('authenticated user can visit account page', function () {
    $this->signIn();

    $this->get("settings/account")->assertOk();
});

test('user can change email', function () {
    $user = User::factory()->create();

    $this->signIn($user);

    $oldMail = $user->email;
    $attributes = [
        "email" => "new-mail@test.com",
    ];

    $this->post("settings/account/email", $attributes);

    $this->assertDatabaseHas("users", ["email" => $user->refresh()->email]);
    $this->assertDatabaseMissing("users", ["email" => $oldMail]);
});

test('user can change name', function () {
    $user = User::factory()->create();

    $this->signIn($user);

    $oldName = $user->name;
    $attributes = [
        "name" => "John",
    ];

    $this->post("settings/account/name", $attributes);

    $this->assertDatabaseHas("users", ["name" => $user->refresh()->name]);
    $this->assertDatabaseMissing("users", ["name" => $oldName]);
});
