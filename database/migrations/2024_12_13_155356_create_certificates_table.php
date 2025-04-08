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
        Schema::create('certificates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('event_id')->references('id')->on('events');
            $table->string('no_certificate');
            $table->string('nip');
            $table->string('name');
            $table->string('body');
            $table->string('date');
            $table->string('template');
            $table->string('category');
            $table->string('status')->nullable();
            $table->string('qr_code');
            $table->string('link');
            $table->string('doc');
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
        Schema::dropIfExists('certificates');
    }
};
