<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->admin()
            ->create([
                "name" => "Barney Mayerson",
                "email" => "mr.barney.mayerson@gmail.com",
                "country" => "AD",
                "password" =>
                    '$2y$10$z080oQ0BglRBE1pJbpPj4uRKvvdsoVwLNgf8eYZ2I//5U4aw4vPRO',
            ]);

        User::factory(10)->create();
    }
}
