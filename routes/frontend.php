<?php

use App\Http\Controllers\CompetitionsController;
use App\Http\Controllers\GameServerController;
use App\Http\Controllers\StandingsController;
use App\Http\Controllers\TourneysController;
use Illuminate\Support\Facades\Route;

Route::get("tourneys", [TourneysController::class, "index"]);
Route::get("competitions", [CompetitionsController::class, "index"]);
Route::get("standings", [StandingsController::class, "index"]);
Route::get("game-server", [GameServerController::class, "index"]);
