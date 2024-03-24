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
        Schema::create('profile_data_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_id')->references('id')->on('profile_data_mains')->restrictOnDelete()->restrictOnUpdate();
            $table->string('agency');
            $table->string('unit')->nullable();
            $table->string('subunit')->nullable();
            $table->string('position');
            $table->string('level');
            $table->date('tmtpos')->nullable();
            $table->string('location')->nullable();
            $table->string('golru')->nullable();
            $table->string('tmtgolru')->nullable();
            $table->string('wyear')->nullable();
            $table->string('wmonth')->nullable();
            $table->enum('type',["PNSP","PPPKP","PPPKD","PNSD"])->nullable();
            $table->enum('status',["Aktif","Non-Aktif"])->default("Aktif");
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
        Schema::dropIfExists('profile_data_positions');
    }
};
