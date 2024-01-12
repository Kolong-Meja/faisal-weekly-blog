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
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();
            $table->string('title', 150)
            ->nullable(false);
            $table->string('meta_title', 150)
            ->nullable(false);
            $table->string('slug', 60)
            ->nullable(false);
            $table->text('description')
            ->nullable(false);
            $table->text('meta_description')
            ->nullable(false);
            $table->text('content')
            ->nullable(false);
            $table->enum('status', 
            ['pending', 'published'])
            ->default('pending')
            ->nullable(false);
            $table->index(['title']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
