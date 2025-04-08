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
        Schema::create('detail_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events')->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('member_id')->references('id')->on('members')->restrictOnDelete()->restrictOnUpdate();
            $table->enum('status',['approved','reject','hadir'])->default('approved');
            $table->enum('title',['panitia','peserta']);
            $table->string('desc')->nullable();
            $table->string('doc')->nullable();
            $table->string('sert')->nullable();
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
        Schema::dropIfExists('detail_events');
    }
};
