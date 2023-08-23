<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Inertia\Response;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(): Response
    {
        $authUser = auth()->user();

        $user = [
            "name" => $authUser->name,
            "mergedName" => $authUser->merged_name,
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
}
