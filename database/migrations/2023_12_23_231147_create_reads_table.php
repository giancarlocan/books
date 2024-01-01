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
        Schema::create('reads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false);
            $table->bigInteger('isbn')->default(0);
            $table->integer('book_id')->default(0);
            $table->integer('report_id')->default(0);
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
        Schema::dropIfExists('reads');
    }
};
