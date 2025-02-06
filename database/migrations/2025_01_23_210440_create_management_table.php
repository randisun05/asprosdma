<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('sub')->nullable();
            $table->string('subitem')->nullable();
            $table->string('status')->default('1');
            $table->string('position')->nullable();
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('document')->nullable();
            $table->string('button')->nullable();
            $table->longText('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management');
    }
};
