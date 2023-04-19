<?php

use App\Http\Controllers\CompetitionsController;
use App\Http\Controllers\GameServerController;
use App\Http\Controllers\StandingsController;
use App\Http\Controllers\TourneysController;
use Illuminate\Support\Facades\Route;

Route::get("competitions", [CompetitionsController::class, "index"])->name(
    "competitions.index"
);
Route::get("tourneys", [TourneysController::class, "index"])->name(
    "tourneys.index"
);
Route::get("standings", [StandingsController::class, "index"])->name(
    "standings.index"
);
Route::get("game-server", [GameServerController::class, "index"])->name(
    "game-server.index"
);
