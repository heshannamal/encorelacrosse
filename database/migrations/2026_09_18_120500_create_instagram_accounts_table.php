<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instagram_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('instagram_user_id')->unique();
            $table->string('username')->nullable();
            $table->text('access_token');
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamp('last_refreshed_at')->nullable();
            $table->timestamp('last_refresh_attempt_at')->nullable();
            $table->text('last_refresh_error')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['active', 'username']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instagram_accounts');
    }
};
