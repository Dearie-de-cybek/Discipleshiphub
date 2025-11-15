<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('stage'); // Foundations, Formation, Service, Influence
            $table->integer('order')->default(0);
            $table->foreignId('spiritual_level_id')->constrained()->onDelete('cascade');
            $table->longText('content')->nullable();
            $table->string('video_url')->nullable();
            $table->string('audio_url')->nullable();
            $table->json('quiz_questions')->nullable(); // JSON array of questions
            $table->integer('xp_reward')->default(10);
            $table->boolean('is_locked')->default(true); // Progressive unlocking
            $table->foreignId('prerequisite_lesson_id')->nullable()->constrained('lessons')->onDelete('set null');
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};