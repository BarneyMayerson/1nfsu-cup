<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class ProfileAvatarController extends Controller
{
    public function store(): RedirectResponse
    {
        request()->validate([
            "avatar" => ["required", File::image()->max(2 * 1024)],
        ]);

        /** @var User $user */
        $user = auth()->user();

        $avatarPath =
            "static" .
            DIRECTORY_SEPARATOR .
            "avatars" .
            DIRECTORY_SEPARATOR .
            $user->id;

        $oldAvatar = $user->getRawOriginal("avatar");

        try {
            $path = request()
                ->file("avatar")
                ->store($avatarPath, "public");

            $user->update(["avatar" => $path]);
            $this->removeFile($oldAvatar);
        } catch (\Exception $e) {
            $user->update(["avatar" => $oldAvatar]);

            return back()->with("status", [
                "type" => "error",
                "message" => "Server failed to change profile picture.",
            ]);
        }

        return back()->with("status", [
            "type" => "success",
            "message" => "Profile picture has been changed.",
        ]);
    }

    public function destroy(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $this->removeFile($user->getRawOriginal("avatar"));

        $user->update(["avatar" => null]);

        return back()->with("status", [
            "type" => "success",
            "message" => "Profile picture has been removed.",
        ]);
    }

    protected function removeFile(?string $path): void
    {
        if ($path) {
            Storage::disk("public")->delete($path);
        }
    }
}
