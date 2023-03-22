<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Momentum\Modal\Modal;

class AuthenticatedSessionController extends Controller
{
    public function create(): Modal
    {
        return Inertia::modal("Auth/Login")
            ->with(["status" => session("status")])
            ->baseRoute("home");
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(): RedirectResponse
    {
        auth()
            ->guard("web")
            ->logout();

        request()
            ->session()
            ->invalidate();
        request()
            ->session()
            ->regenerateToken();

        return redirect("/");
    }
}
