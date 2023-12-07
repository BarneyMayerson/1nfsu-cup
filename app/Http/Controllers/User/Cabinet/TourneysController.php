<?php

namespace App\Http\Controllers\User\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Tourney;
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
        $attributes = $request->validate([
            "name" => "required|string|min:4|max:100",
            "track_id" => "required|size:5",
            "room" => "required|string|max:20",
            "started_at" => "required|date|after:tomorrow",
            "signup_time" => "required",
            "description" => "nullable",
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->user();

        $attributes = array_merge(
            [
                "supervisor_id" => $user->id,
                "supervisor_username" => "Mia",
                "status" => "Planned",
                "season_index" => 1,
            ],
            $attributes
        );

        try {
            Tourney::create($attributes);

            return to_route("cabinet.tourneys.index")->with("status", [
                "type" => "success",
                "message" => "Tourney has been created.",
            ]);
        } catch (\Exception $e) {
            return to_route("cabinet.tourneys.index")->with("status", [
                "type" => "error",
                "message" => "Something went wrong!",
            ]);
        }
    }
}
