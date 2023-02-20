<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function login_screen_can_be_rendered(): void
    {
        $response = $this->get("/login");

        $response->assertStatus(200);
    }

    /** @test */
    function users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post("/login", [
            "email" => $user->email,
            "password" => "password",
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /** @test */
    public function users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post("/login", [
            "email" => $user->email,
            "password" => "wrong-password",
        ]);

        $this->assertGuest();
    }

    /** @test */
    function users_can_log_out()
    {
        $user = User::factory()->create();

        Auth::login($user);

        $response = $this->post("/logout");

        $this->assertGuest();
        $response->assertRedirect("/");
    }

    /** @test */
    function only_authenticated_users_can_log_out()
    {
        $this->assertTrue(Auth::guest());

        $this->post("/logout")->assertRedirect("/login");
    }
}
