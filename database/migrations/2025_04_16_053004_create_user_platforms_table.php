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
        Schema::create('user_platforms', function (Blueprint $table) {
            $table->id();
            $table->enum('platform',['discord','bungie'])->index();
            $table->integer('user_id')->nullable()->index();
            $table->string('entity_id',32)->index();
            $table->string('email',32)->index();
            $table->json('metadata');
            $table->timestamps();

            $table->foreign('user_id','fk_user_platform')->references('id')->on('users');
            $table->unique(['platform','entity_id'], 'uk_platform_entity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_platforms');
    }
};
