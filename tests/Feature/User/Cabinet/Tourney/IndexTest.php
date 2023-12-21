<?php

use App\Models\Tourney;
use Inertia\Testing\AssertableInertia;
use function Pest\Laravel\get;

uses()->group("cabinet.tourney");

test("guest cannon visit tourney index page", function () {
    $this->get(route("cabinet.tourneys.index"))->assertRedirect("/login");
});

it("should return the correct component", function () {
    $this->signIn();

    get(route("cabinet.tourneys.index"))->assertInertia(
        fn(AssertableInertia $inertia) => $inertia->component(
            "User/Cabinet/Tourneys/Index",
            true
        )
    );
});

it("passes user's tourneys to the view", function () {
    $this->signIn();
    // $tourneys = Tourney::factory(3)->create();

    get(route("cabinet.tourneys.index"))->assertInertia(
        fn(AssertableInertia $inertia) => $inertia->has("tourneys")
    );
});
