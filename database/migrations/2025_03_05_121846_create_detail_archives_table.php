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
        Schema::create('detail_archives', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('archive_id');
            $table->foreign('archive_id')->references('id')->on('archives');
            $table->foreignId('user_id')->constrained('users');
            $table->string('from')->constrained('users');
            $table->string('noticket');
            $table->string('title')->nullable();
            $table->longText('detail')->nullable();
            $table->string('document')->nullable();
            $table->enum('status',['1','2','3','4','5'])->default('1');
            $table->string('dispositions')->nullable();
            $table->string('isi')->nullable();
            $table->string('action')->nullable();
            $table->string('reaction')->nullable();
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
        Schema::dropIfExists('detail_archives');
    }
};
