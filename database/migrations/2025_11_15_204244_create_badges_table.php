<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Faith Builder, Prayer Warrior, etc.
            $table->text('description');
            $table->string('icon')->nullable();
            $table->string('category'); // devotion, quest, lesson, milestone
            $table->integer('xp_reward')->default(0);
            $table->json('requirements')->nullable(); // JSON with requirements
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};