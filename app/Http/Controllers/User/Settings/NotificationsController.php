<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Inertia\Inertia;

class NotificationsController extends Controller
{
    public function editBrowser(): Response
    {
        return Inertia::render("User/Settings/Notifications/Browser");
    }

    public function editEmail(): Response
    {
        return Inertia::render("User/Settings/Notifications/Email");
    }
}
