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
        Schema::create('registrations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->string('agency');
            $table->string('position');
            $table->string('level');
            $table->string('document_jab');
            $table->enum('status',['submission','paid','confirm','approved','rejected','corrected'])->default('submission');
            $table->string('info')->nullable();
            $table->string('paid')->nullable();
            $table->integer('emailstatus')->default(0);
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
        Schema::dropIfExists('registrations');
    }
};
