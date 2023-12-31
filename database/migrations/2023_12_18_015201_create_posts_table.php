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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->text('title');
            $table->text('description');
            $table->text('meta_title');
            $table->text('slug');
            $table->longText('content');
            $table->tinyText('keywords');
            $table->index(['title']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
