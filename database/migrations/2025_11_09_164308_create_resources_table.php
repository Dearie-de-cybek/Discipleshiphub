<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('week_number'); // 1-12 for the 12 weeks
            $table->enum('type', ['document', 'video', 'audio', 'link', 'other'])->default('document');
            $table->string('file_path')->nullable(); // For uploaded files
            $table->string('external_link')->nullable(); // For external resources
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // Table for tracking which resources users have accessed
        Schema::create('resource_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('resource_id')->constrained()->onDelete('cascade');
            $table->timestamp('viewed_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_views');
        Schema::dropIfExists('resources');
    }
};