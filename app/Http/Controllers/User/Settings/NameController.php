<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class NameController extends Controller
{
    public function edit(): Modal
    {
        return Inertia::modal("User/Settings/Name")->baseRoute(
            "settings.account.edit"
        );
    }

    public function update(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            "name" => ["required", "min:4", Rule::unique("users")],
        ]);

        /** @var User $user */
        $user = auth()->user();
        $user->update($attributes);

        return to_route("settings.account.edit")->with("status", [
            "type" => "success",
            "message" => "Name has been changed.",
        ]);
    }
}
