<?php

use App\Http\Controllers\User\Cabinet\DashboardController;
use App\Http\Controllers\User\Cabinet\TourneysController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        "middleware" => ["auth"],
        "prefix" => "cabinet",
        "as" => "cabinet.",
    ],
    function () {
        Route::get("", DashboardController::class)->name("index");

        // tourneys
        Route::group(
            [
                "prefix" => "tourneys",
                "as" => "tourneys.",
            ],
            function () {
                Route::get("", [TourneysController::class, "index"])->name(
                    "index"
                );
                Route::get("create", [
                    TourneysController::class,
                    "create",
                ])->name("create");
                Route::post("", [TourneysController::class, "store"])->name(
                    "store"
                );
            }
        );
    }
);
