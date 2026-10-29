<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('has_leasehold')->unsigned()->default(false)->after('ownership_type');
            $table->unsignedBigInteger('leasehold_price')->default(0)->after('has_leasehold');
            $table->boolean('has_freehold')->unsigned()->default(false)->after('leasehold_price');
            $table->unsignedBigInteger('freehold_price')->default(0)->after('has_freehold');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['has_leasehold', 'leasehold_price', 'has_freehold', 'freehold_price']);
        });
    }
};
