<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class EmailController extends Controller
{
    public function edit(): Modal
    {
        return Inertia::modal("User/Settings/Email")->baseRoute(
            "settings.account.edit"
        );
    }

    public function update(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            "email" => ["required", "email:filter", Rule::unique("users")],
        ]);

        sleep(10);

        /** @var User $user */
        $user = auth()->user();
        // $user->update($attributes);

        return to_route("settings.account.edit")->with("status", [
            "type" => "success",
            "message" => "Email has been changed.",
        ]);
    }
}
