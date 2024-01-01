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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0)->nullable(false);
            $table->integer('read_id')->default(0)->nullable(false);
            $table->integer('book_id')->default(0)->nullable(false);
            $table->integer('rating')->default(0)->nullable(false);
            $table->text('description');
            $table->boolean('is_approved')->nullable()->default(null);
            $table->integer('user_id_approved')->default(0);
            $table->dateTime('approved_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
