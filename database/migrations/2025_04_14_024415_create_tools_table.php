<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->index();
            $table->string('name')->unique();
            $table->string('url');
            $table->foreign("game_id", "fk_tool_game")->references("id")->on("games");
            $table->unique(["name", "game_id"], "uk_tool_game");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
