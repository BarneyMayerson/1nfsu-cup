<?php

use App\Http\Controllers\User\Settings\AccountController;
use App\Http\Controllers\User\Settings\NotificationsController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\ProfileAvatarController;
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
        Route::post("profile/avatar", [
            ProfileAvatarController::class,
            "store",
        ])->name("profile.setAvatar");
        Route::delete("profile/avatar", [
            ProfileAvatarController::class,
            "destroy",
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
