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
        Schema::create('clans', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->index();
            $table->text('group_id')->index();
            $table->string('name');
            $table->string('slug')->index();
            $table->boolean('active')->default(true);
            $table->foreign("game_id", "fk_clan_game")->references("id")->on("games");
            $table->unique(["slug", "game_id"], "uk_game_clan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clans');
    }
};
