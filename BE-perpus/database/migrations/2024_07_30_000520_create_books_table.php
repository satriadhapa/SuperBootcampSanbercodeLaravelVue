<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('title');
        $table->text('summary')->nullable();
        $table->string('image')->nullable();
        $table->integer('stok')->default(0);
        $table->uuid('category_id');
        $table->foreign('category_id')->references('id')->on('categories');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
