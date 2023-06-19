<?php

namespace Tests\Feature\User\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_cannot_visit_account_page()
    {
        $this->get("settings/account")->assertRedirect("login");
    }

    /** @test */
    function authenticated_user_can_visit_account_page()
    {
        $this->signIn();

        $this->get("settings/account")->assertOk();
    }

    /** @test */
    function user_can_change_email()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->signIn($user);

        $oldMail = $user->email;
        $attributes = [
            "email" => "new-mail@test.com",
        ];

        $this->post("settings/account/email", $attributes);

        $this->assertDatabaseHas("users", ["email" => $user->refresh()->email]);
        $this->assertDatabaseMissing("users", ["email" => $oldMail]);
    }
}
