<?php

use App\Http\Controllers\User\Settings\AccountController;
use App\Http\Controllers\User\Settings\NotificationsController;
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
        Route::post("profile", [ProfileController::class, "setAvatar"])->name(
            "profile.setAvatar"
        );
        Route::delete("profile", [
            ProfileController::class,
            "removeAvatar",
        ])->name("profile.removeAvatar");

        Route::get("account", [AccountController::class, "index"])->name(
            "account.edit"
        );

        Route::get("notifications/browser", [
            NotificationsController::class,
            "editBrowser",
        ])->name("notifications.editBrowser");
        Route::get("notifications/email", [
            NotificationsController::class,
            "editEmail",
        ])->name("notifications.editEmail");
    });
