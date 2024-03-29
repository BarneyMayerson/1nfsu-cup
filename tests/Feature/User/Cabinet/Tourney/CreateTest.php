<?php

use App\Models\User;

uses()->group("cabinet.tourney");

test("guest cannot create a tourney", function () {
    $this->post(route("cabinet.tourneys.store"), [])->assertRedirect("/login");

    $this->assertDatabaseEmpty("tourneys");
});

test("guest cannon visit create tourney page", function () {
    $this->get(route("cabinet.tourneys.create"))->assertRedirect("/login");
});

test("user can visit create tourney page", function () {
    $this->signIn();

    $this->get(route("cabinet.tourneys.create"))->assertOk();
});

test("user can create a tourney", function () {
    $user = User::factory()->create();
    $this->signIn($user);

    $attributes = [
        "name" => "Circuit #1",
        "track_id" => "10010",
        "room" => "TOURNEY",
        "started_at" => now()->addDay(10),
        "signup_time" => "30",
        "description" => "",
    ];

    $this->post(route("cabinet.tourneys.store"), $attributes)->assertRedirect(
        route("cabinet.tourneys.index")
    );
    $this->assertDatabaseCount("tourneys", 1);
});
