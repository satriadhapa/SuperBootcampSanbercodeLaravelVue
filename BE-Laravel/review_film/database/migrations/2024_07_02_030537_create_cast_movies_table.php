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
        Schema::create('cast_movies', function (Blueprint $table) {
            $table->uuid("id");
            $table->string("name");
            $table->uuid("cast_id");
            $table->foreign('cast_id')->references('id')->on('cast')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->uuid("movie_id");
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_movies');
    }
};
