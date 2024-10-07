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
        Schema::create('react_details', function (Blueprint $table) {
            $table->id();
            $table->string('post_id');
            $table->string('member_id')->references('id')->on('members');
            $table->string('react_id')->references('id')->on('react_types');
            $table->string('status');
            $table->string('type');
            $table->string('comment')->nullable();
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('react_details');
    }
};
