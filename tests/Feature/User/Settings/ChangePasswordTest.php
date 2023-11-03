<?php

namespace Tests\Feature\User\Settings;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_change_own_password()
    {
        $this->signIn();

        $attributes = [
            "password" => "new-password",
            "password_confirmation" => "new-password",
        ];

        $this->post("settings/account/password", $attributes);

        $user = Auth::user();

        $this->assertTrue(Hash::check("new-password", $user->password));
    }
}
