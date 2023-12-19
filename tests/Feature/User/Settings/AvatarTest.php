<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user can add an avatar', function () {
    Storage::fake("public");

    /** @var User $user */
    $user = User::factory()->create();
    $this->signIn($user);

    expect($user->avatar)->toBeNull();

    $avatar = UploadedFile::fake()->image("image.jpg");

    $this->post("settings/profile/avatar", compact("avatar"));

    $user->refresh();

    expect($user->avatar)->not->toBeNull();
    Storage::disk("public")->assertExists($user->getRawOriginal("avatar"));
});

test('user can remove own avatar', function () {
    Storage::fake("public");

    /** @var User $user */
    $user = User::factory()->create();
    $this->signIn($user);

    $avatar = UploadedFile::fake()->image("image.jpg");

    $this->post("settings/profile/avatar", compact("avatar"));

    $user->refresh();

    $filePath = $user->getRawOriginal("avatar");

    expect($filePath)->not->toBeNull();
    Storage::disk("public")->assertExists($filePath);

    $this->delete("settings/profile/avatar");

    expect($user->avatar)->toBeNull();
    Storage::disk("public")->assertMissing($filePath);
});

test('previous avatar file is removed when user select another one', function () {
    Storage::fake("public");

    /** @var User $user */
    $user = User::factory()->create();
    $this->signIn($user);

    $avatar = UploadedFile::fake()->image("image.jpg");

    $this->post("settings/profile/avatar", compact("avatar"));

    $user->refresh();

    $filePath = $user->getRawOriginal("avatar");

    Storage::disk("public")->assertExists($filePath);

    $newAvatar = UploadedFile::fake()->image("new-image.jpg");

    $this->post("settings/profile/avatar", [
        "avatar" => $newAvatar,
    ]);

    $user->refresh();

    Storage::disk("public")->assertMissing($filePath);
    Storage::disk("public")->assertExists($user->getRawOriginal("avatar"));
});
