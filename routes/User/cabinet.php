<?php

use App\Http\Controllers\User\Cabinet\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        "middleware" => ["auth"],
        "prefix" => "cabinet",
        "as" => "cabinet.",
    ],
    function () {
        Route::get("", DashboardController::class)->name("index");
    }
);
