<?php

namespace Tests\Feature\User\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AvatarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_add_an_avatar()
    {
        Storage::fake("public");

        /** @var User $user */
        $user = User::factory()->create();
        $this->signIn($user);

        $this->assertNull($user->avatar);

        $avatar = UploadedFile::fake()->image("image.jpg");

        $this->post("settings/profile/avatar", compact("avatar"));

        $user->refresh();

        $this->assertNotNull($user->avatar);
        Storage::disk("public")->assertExists($user->getRawOriginal("avatar"));
    }

    /** @test */
    function user_can_remove_own_avatar()
    {
        Storage::fake("public");

        /** @var User $user */
        $user = User::factory()->create();
        $this->signIn($user);

        $avatar = UploadedFile::fake()->image("image.jpg");

        $this->post("settings/profile/avatar", compact("avatar"));

        $user->refresh();

        $filePath = $user->getRawOriginal("avatar");

        $this->assertNotNull($filePath);
        Storage::disk("public")->assertExists($filePath);

        $this->delete("settings/profile/avatar");

        $this->assertNull($user->avatar);
        Storage::disk("public")->assertMissing($filePath);
    }

    /** @test */
    function previous_avatar_file_is_removed_when_user_select_another_one()
    {
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
    }
}
