<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('role_id')
            ->references('id')
            ->on('roles')
            ->cascadeOnDelete();
            $table->string('username', 50)
            ->nullable(false)
            ->unique();
            $table->string('name', 100)
            ->nullable(false);
            $table->string('email', 100)
            ->nullable(false)
            ->unique();
            $table->timestamp('email_verified_at')
            ->nullable(true);
            $table->string('password')
            ->nullable(false);
            $table->dateTime('last_login_at')
            ->nullable(true);
            $table->enum('status', ['offline', 'online'])
            ->default('offline')
            ->nullable(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
