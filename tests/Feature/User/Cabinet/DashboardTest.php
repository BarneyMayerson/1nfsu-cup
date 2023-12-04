<?php

namespace Tests\Feature\User\Cabinet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_cannot_visit_cabinet_page(): void
    {
        $this->get("/cabinet")->assertRedirect("/login");
    }

    /** @test */
    function authenticated_user_can_visit_cabinet_page(): void
    {
        $this->signIn();

        $this->get("/cabinet")->assertOk();
    }
}
