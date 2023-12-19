<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user can change own password', function () {
    $this->signIn();

    $attributes = [
        "password" => "new-password",
        "password_confirmation" => "new-password",
    ];

    $this->post("settings/account/password", $attributes);

    $user = Auth::user();

    expect(Hash::check("new-password", $user->password))->toBeTrue();
});
