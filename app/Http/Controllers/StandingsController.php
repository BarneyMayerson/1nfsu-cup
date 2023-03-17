<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StandingsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("Standings/Index");
    }
}
