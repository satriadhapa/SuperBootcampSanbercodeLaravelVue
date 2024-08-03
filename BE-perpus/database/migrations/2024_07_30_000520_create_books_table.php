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
        $table->string('title', 255);
        $table->text('summary')->nullable();
        $table->string('image', 255)->nullable();
        $table->integer('stok');
        $table->uuid('category_id');
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('books');
}

};
