<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Inertia\Response;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(): Response
    {
        $authUser = auth()->user();

        $user = [
            "name" => $authUser->name,
            "country" => $authUser->country,
            "avatar" => $authUser->avatar,
        ];

        return Inertia::render("User/Settings/Profile", compact("user"));
    }

    public function update(): RedirectResponse
    {
        $attributes = request()->validate([
            "name" => [
                "required",
                Rule::unique("users", "name")->ignore(auth()->id()),
            ],
            "country" => ["nullable", "string", "max:6"],
        ]);

        /** @var User $user */
        $user = auth()->user();
        $user->update($attributes);

        return to_route("settings.profile.edit")->with("status", [
            "type" => "success",
            "message" => "Profile has been updated.",
        ]);
    }

    public function setAvatar(): RedirectResponse
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

    public function removeAvatar(): RedirectResponse
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
