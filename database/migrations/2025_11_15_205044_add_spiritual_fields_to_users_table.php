<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('xp_points')->default(0)->after('password');
            $table->foreignId('current_level_id')->nullable()->constrained('spiritual_levels')->after('xp_points');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['current_level_id']);
            $table->dropColumn(['xp_points', 'current_level_id']);
        });
    }
};