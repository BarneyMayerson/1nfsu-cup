<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_profile_page_can_be_rendered()
    {
        $user = User::factory()->create([
            "name" => "John Doe",
        ]);

        $this->get("profile/{$user->name}")->assertOk();
    }
}
