<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TourneysController extends Controller
{
    public function index(): Response
    {
        sleep(3);
        return Inertia::render("Tourneys/Index");
    }
}
