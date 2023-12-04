<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", function () {
    return Inertia::render("Home");
})->name("home");

require __DIR__ . "/auth.php";
require __DIR__ . "/frontend.php";
require __DIR__ . "/User/settings.php";
require __DIR__ . "/User/cabinet.php";
