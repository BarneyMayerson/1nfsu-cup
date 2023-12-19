<?php

use App\Models\User;

it('may have an avatar', function () {
    $user = User::factory()->make([
        "avatar" => "path-to-avatar",
    ]);

    expect($user->avatar)->not->toBeEmpty();
});

it('has valid merged name', function () {
    $user = User::factory()->make([
        "name" => "John Doe Junior",
    ]);

    expect($user->merged_name)->toEqual("JohnDoeJunior");
});

it('has valid pure name', function () {
    $user = User::factory()->make([
        "name" => "John Doe Junior",
    ]);

    expect($user->pure_name)->toEqual("johndoejunior");
});

it('detects the admin', function () {
    $user = User::factory()
        ->admin()
        ->make();

    expect($user->isAdmin())->toBeTrue();
});

it('returns information attribute array', function () {
    $user = User::factory()->make();

    $infoAttributes = $user->infoAttributes();

    expect($infoAttributes)->toHaveKey("name");
    expect($infoAttributes)->toHaveKey("mergedName");
    expect($infoAttributes)->toHaveKey("country");
    expect($infoAttributes)->toHaveKey("avatar");
});
