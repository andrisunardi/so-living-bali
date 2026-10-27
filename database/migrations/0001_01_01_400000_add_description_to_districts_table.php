<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->text('description_id')->nullable()->after('description');
            $table->text('description_fr')->nullable()->after('description_id');
        });
    }

    public function down(): void
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->dropColumn(['description', 'description_id', 'description_fr']);
        });
    }
};
