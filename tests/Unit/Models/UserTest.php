<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    function it_may_have_an_avatar()
    {
        $user = User::factory()->make([
            "avatar" => "path-to-avatar",
        ]);

        $this->assertNotEmpty($user->avatar);
    }

    /** @test */
    function it_has_valid_merged_name()
    {
        $user = User::factory()->make([
            "name" => "John Doe Junior",
        ]);

        $this->assertEquals("JohnDoeJunior", $user->merged_name);
    }

    /** @test */
    function it_has_valid_pure_name()
    {
        $user = User::factory()->make([
            "name" => "John Doe Junior",
        ]);

        $this->assertEquals("johndoejunior", $user->pure_name);
    }

    /** @test */
    function it_detects_the_admin()
    {
        $user = User::factory()
            ->admin()
            ->make();

        $this->assertTrue($user->isAdmin());
    }

    /** @test */
    function it_returns_information_attribute_array()
    {
        $user = User::factory()->make();

        $infoAttributes = $user->infoAttributes();

        $this->assertArrayHasKey("name", $infoAttributes);
        $this->assertArrayHasKey("mergedName", $infoAttributes);
        $this->assertArrayHasKey("country", $infoAttributes);
        $this->assertArrayHasKey("avatar", $infoAttributes);
    }
}
