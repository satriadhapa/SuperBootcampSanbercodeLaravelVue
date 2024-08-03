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
    Schema::create('users', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('name', 255);
        $table->string('email', 255)->unique();
        $table->string('password', 255);
        $table->uuid('role_id');
        $table->timestamps();

        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('users');
    }

};
