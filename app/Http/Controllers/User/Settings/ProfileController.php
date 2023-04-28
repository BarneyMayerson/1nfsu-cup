<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Inertia\Response;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(): Response
    {
        $user = [
            "name" => auth()->user()->name,
            "email" => auth()->user()->email,
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
            "email" => [
                "required",
                "email:filter",
                Rule::unique("users", "email")->ignore(auth()->id()),
            ],
        ]);

        $user = auth()->user();
        $user->update($attributes);

        return to_route("settings.profile.edit")->with("status", [
            "type" => "success",
            "message" => "Profile has been updated.",
        ]);
    }
}
