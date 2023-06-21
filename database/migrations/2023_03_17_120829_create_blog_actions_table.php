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
        Schema::create('blog_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->foreignId('blog_id')
            ->constrained('blogs')
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_actions');
    }
};
