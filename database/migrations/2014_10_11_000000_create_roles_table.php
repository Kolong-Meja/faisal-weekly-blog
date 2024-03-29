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
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 50)
            ->unique(true)
            ->nullable(false);
            $table->string('description', 255)->nullable(false);
            $table->text('abilities')->nullable(true);
            $table->enum('status', ['inactive', 'active'])->default('inactive')->nullable(false);
            $table->index(['title']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
