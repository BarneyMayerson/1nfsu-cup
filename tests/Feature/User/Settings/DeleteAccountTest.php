<?php

namespace Tests\Feature\User\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_delete_own_account()
    {
        $user = User::factory()->create();
        $this->signIn($user);

        $attributes = [
            "email" => $user->email,
            "phrase" => "delete my account right now",
        ];

        $this->delete("settings/account", $attributes);

        $this->assertSoftDeleted($user);
    }
}
