<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            "email" => "required|email:filter|unique:" . User::class,
        ]);

        /** @var User $user */
        $user = auth()->user();
        $user->update($attributes);

        return to_route("settings.account.edit")->with("status", [
            "type" => "success",
            "message" => "Email has been changed.",
        ]);
    }
}
