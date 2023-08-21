<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PublicProfileController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $foundUser = $request->name
            ? User::findByNameWithoutWhitespaces($request->name)
            : null;

        $user = $foundUser
            ? [
                "name" => $foundUser->name,
                "country" => $foundUser->country,
                "avatar" => $foundUser->avatar,
            ]
            : null;

        return Inertia::render("PublicProfile", compact("user"));
    }
}
