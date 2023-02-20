<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("register", [RegisterController::class, "create"])->name(
        "register"
    );
    Route::post("register", [RegisterController::class, "store"]);

    Route::get("login", [
        AuthenticatedSessionController::class,
        "create",
    ])->name("login");
    Route::post("login", [AuthenticatedSessionController::class, "store"]);
});

Route::middleware("auth")->group(function () {
    Route::get("verify-email", EmailVerificationPromptController::class)->name(
        "verification.notice"
    );
    Route::get("verify-email/{id}/{hash}", VerifyEmailController::class)
        ->middleware(["signed", "throttle:6,1"])
        ->name("verification.verify");

    Route::post("logout", [
        AuthenticatedSessionController::class,
        "destroy",
    ])->name("logout");
});