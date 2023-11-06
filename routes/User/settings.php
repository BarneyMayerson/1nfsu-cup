<?php

use App\Http\Controllers\User\Settings\AccountController;
use App\Http\Controllers\User\Settings\EmailController;
use App\Http\Controllers\User\Settings\NameController;
use App\Http\Controllers\User\Settings\NotificationsController;
use App\Http\Controllers\User\Settings\PasswordController;
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
        Route::get("account/delete", [
            AccountController::class,
            "delete",
        ])->name("account.delete");
        Route::delete("account", [AccountController::class, "destroy"])->name(
            "account.destroy"
        );
        Route::get("account/email", [EmailController::class, "edit"])->name(
            "account.email.edit"
        );
        Route::post("account/email", [EmailController::class, "update"])->name(
            "account.email.update"
        );
        Route::get("account/name", [NameController::class, "edit"])->name(
            "account.name.edit"
        );
        Route::post("account/name", [NameController::class, "update"])->name(
            "account.name.update"
        );
        Route::get("account/password", [
            PasswordController::class,
            "edit",
        ])->name("account.password.edit");
        Route::post("account/password", [
            PasswordController::class,
            "update",
        ])->name("account.password.update");

        Route::get("notifications/browser", [
            NotificationsController::class,
            "editBrowser",
        ])->name("notifications.editBrowser");
        Route::get("notifications/email", [
            NotificationsController::class,
            "editEmail",
        ])->name("notifications.editEmail");
    });
