<?php

namespace App\Http\Controllers\User\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Momentum\Modal\Modal;

class TourneysController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("User/Cabinet/Tourneys/Index");
    }

    public function create(): Modal
    {
        return Inertia::modal("User/Cabinet/Tourneys/Create")->baseRoute(
            "cabinet.tourneys.index"
        );
    }

    public function store(Request $request): RedirectResponse
    {
        return to_route("cabinet.tourneys.index")->with("status", [
            "type" => "success",
            "message" => "Tourney has been created.",
        ]);
    }
}
