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
        Schema::create('registration_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('agency');
            $table->string('name');
            $table->string('contact');
            $table->string('email');
            $table->integer('total');
            $table->string('file');
            $table->enum('status',['submission','done','confirm','rejected'])->default('submission');
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
        Schema::dropIfExists('registration_groups');
    }
};
