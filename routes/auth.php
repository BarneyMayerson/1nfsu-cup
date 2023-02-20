<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("register", [RegisterController::class, "create"])->name(
        "register"
    );
});
