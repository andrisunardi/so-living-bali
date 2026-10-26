<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->json('nearby')->nullable()->after('developer_name');
            $table->string('video_tour')->nullable()->after('nearby');
            $table->string('floor_plan')->nullable()->after('video_tour');
            $table->json('highlights')->nullable()->after('floor_plan');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['nearby', 'video_tour', 'floor_plan', 'highlights']);
        });
    }
};
