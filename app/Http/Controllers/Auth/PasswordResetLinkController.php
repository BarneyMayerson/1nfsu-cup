<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class PasswordResetLinkController extends Controller
{
    public function create(): Modal
    {
        return Inertia::modal("Auth/ForgotPassword")->baseRoute("login");
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => "required|email:filter|max:255",
        ]);

        try {
            $status = Password::sendResetLink($request->only("email"));
        } catch (\Exception $e) {
            return back()->with("status", [
                "type" => "error",
                "message" => "Something went wrong!\n {$e->getMessage()}",
            ]);
        }

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with("status", [
                "type" => "success",
                "message" => __($status),
            ]);
        }

        throw ValidationException::withMessages([
            "email" => [trans($status)],
        ]);
    }
}
