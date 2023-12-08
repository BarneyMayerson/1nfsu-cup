<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tourney>
 */
class TourneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->sentence(2),
            "track_id" => Arr::random(["10010", "12020", "11020", "13010"]),
            "room" => "tourney",
            "started_at" => now()->addDays(2),
            "signup_time" => "15",
            "supervisor_id" => User::factory(),
            "supervisor_username" => "Super",
            "status" => "planned",
        ];
    }
}
