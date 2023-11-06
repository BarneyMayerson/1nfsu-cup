<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class AccountController extends Controller
{
    public function index(): Response
    {
        $authUser = auth()->user();

        $user = $authUser->infoAttributes();

        return Inertia::render("User/Settings/Account", compact("user"));
    }

    public function delete(): Modal
    {
        return Inertia::modal("User/Settings/Delete")->baseRoute(
            "settings.account.edit"
        );
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            "email" => ["required", "email", "in:" . $user->email],
            "phrase" => "required|regex:/delete my account right now/",
        ]);

        Auth::logout();
        $user->delete();

        return to_route("home")->with("status", [
            "type" => "success",
            "message" => "Account has been deleted.",
        ]);
    }
}
