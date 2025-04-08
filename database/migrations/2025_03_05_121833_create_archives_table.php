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
        Schema::create('archives', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('noticket');
            $table->string('nip')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('agency')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->longText('detail')->nullable();
            $table->string('dispositions')->nullable();
            $table->enum('status',['1','2','3','4','5'])->default('1');
            $table->string('isi')->nullable();
            $table->string('reaction')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('archives');
    }
};
