<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_devotions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->text('scripture_reference');
            $table->longText('content');
            $table->text('reflection_question')->nullable();
            $table->text('prayer_point')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_devotions');
    }
};