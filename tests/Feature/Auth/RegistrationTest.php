<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_screen_can_be_rendered(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get("/register");

        $response->assertStatus(200);
    }
}
