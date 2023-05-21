<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("User/Settings/Account");
    }
}
