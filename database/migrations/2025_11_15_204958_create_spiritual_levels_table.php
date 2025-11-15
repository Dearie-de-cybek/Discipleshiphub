<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spiritual_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Seeker, Believer, Disciple, etc.
            $table->integer('order'); // 1-7
            $table->integer('xp_required'); // XP needed to reach this level
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spiritual_levels');
    }
};