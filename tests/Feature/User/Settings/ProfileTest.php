<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guest cannot visit profile page', function () {
    $this->get("settings/profile")->assertRedirect("login");
});

test('authenticated user can visit profile page', function () {
    $this->signIn();

    $this->get("settings/profile")->assertOk();
});

test('user can change name', function () {
    $user = User::factory()->create();

    $this->signIn($user);

    $oldName = $user->name;

    $attributes = [
        "name" => "New Name",
    ];

    $this->put("settings/profile", $attributes);

    $this->assertDatabaseHas("users", $attributes);
    $this->assertDatabaseMissing("users", ["name" => $oldName]);
});

test('name must be unique', function () {
    User::factory()->create([
        "name" => "John Doe",
    ]);

    $this->signIn();

    $attributes = [
        "name" => "John Doe",
    ];

    $response = $this->put("settings/profile", $attributes);
    $response->assertSessionHasErrors("name");
});

test('user can change country', function () {
    $user = User::factory()->create();

    $this->signIn($user);

    $attributes = [
        "name" => $user->name,
        "country" => "BE",
    ];

    $this->put("settings/profile", $attributes);

    $this->assertDatabaseHas("users", $attributes);
    $this->assertDatabaseMissing("users", ["country" => null]);
});
