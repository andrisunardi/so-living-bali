<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('oauth', function (Blueprint $table) {
            $table->id();
            $table->text('access_token');
            $table->text('token_type');
            $table->integer('expires_in');
            $table->text('refresh_token');
            $table->text('scope');
            $table->text('refreshTokenId');
            $table->text('userType');
            $table->text('companyId');
            $table->text('locationId');
            $table->text('isBulkInstallation');
            $table->text('userId');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oauth');
    }
};
