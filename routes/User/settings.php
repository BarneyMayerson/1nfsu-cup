<?php

use App\Http\Controllers\User\Settings\AccountController;
use App\Http\Controllers\User\Settings\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")
    ->as("settings.")
    ->prefix("settings")
    ->group(function () {
        Route::get("profile", [ProfileController::class, "index"])->name(
            "profile.edit"
        );
        Route::put("profile", [ProfileController::class, "update"])->name(
            "profile.update"
        );

        Route::get("account", [AccountController::class, "index"])->name(
            "account.edit"
        );
    });
