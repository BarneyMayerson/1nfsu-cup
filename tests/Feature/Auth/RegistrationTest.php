<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_screen_can_be_rendered(): void
    {
        $response = $this->get("/register");

        $response->assertStatus(200);
    }

    /** @test */
    function new_users_can_register(): void
    {
        $response = $this->post("/register", [
            "name" => "Test Name",
            "email" => "test@example.com",
            "password" => "password",
            "password_confirmation" => "password",
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
