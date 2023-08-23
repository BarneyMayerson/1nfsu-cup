<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index(): Response
    {
        $authUser = auth()->user();

        $user = [
            "name" => $authUser->name,
            "mergedName" => $foundUser->merged_name,
            "country" => $authUser->country,
            "avatar" => $authUser->avatar,
        ];
        return Inertia::render("User/Settings/Account", compact("user"));
    }
}
