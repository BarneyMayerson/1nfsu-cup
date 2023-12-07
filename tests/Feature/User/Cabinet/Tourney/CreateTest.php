<?php

namespace Tests\Feature\User\Cabinet\Tourney;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_cannot_create_a_tourney(): void
    {
        $this->post("/cabinet/tourneys", [])->assertRedirect("/login");

        $this->assertDatabaseEmpty("tourneys");
    }

    /** @test */
    function guest_cannon_visit_create_tourney_page(): void
    {
        $this->get("/cabinet/tourneys/create")->assertRedirect("/login");
    }

    /** @test */
    function user_can_visit_create_tourney_page(): void
    {
        $this->signIn();

        $this->get("/cabinet/tourneys/create")->assertOk();
    }

    /** @test */
    function user_can_create_a_tourney()
    {
        $user = User::factory()->create();
        $this->signIn($user);

        $attributes = [
            "name" => "Circuit #1",
            "track_id" => "10010",
            "room" => "TOURNEY",
            "started_at" => now()->addDay(10),
            "signup_time" => "30",
            "description" => "",
        ];

        $this->post("/cabinet/tourneys", $attributes)->assertRedirect(
            "/cabinet/tourneys"
        );
        $this->assertDatabaseCount("tourneys", 1);
    }
}
