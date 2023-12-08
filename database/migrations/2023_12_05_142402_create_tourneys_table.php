<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tourneys", function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("track_id", 5);
            $table->string("room", 20);
            $table->timestamp("started_at");
            $table->unsignedSmallInteger("signup_time");
            $table
                ->foreignId("supervisor_id")
                ->nullable()
                ->constrained("users")
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string("supervisor_username", 16);
            $table->string("status", 20)->default("planned");
            $table->unsignedInteger("season_index")->default(1);
            $table->text("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tourneys");
    }
};
