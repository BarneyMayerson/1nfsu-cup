<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class PasswordController extends Controller
{
    public function edit(): Modal
    {
        return Inertia::modal("User/Settings/Password")->baseRoute(
            "settings.account.edit"
        );
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            "password" => ["required", "confirmed", Rules\Password::defaults()],
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->update(["password" => Hash::make($request->password)]);

        return to_route("settings.account.edit")->with("status", [
            "type" => "success",
            "message" => "Password has been changed.",
        ]);
    }
}
