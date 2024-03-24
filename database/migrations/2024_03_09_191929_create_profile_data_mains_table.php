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
        Schema::create('profile_data_mains', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nomember')->unique();
            $table->enum('statusmember',['Anggota Biasa','Anggota Luar Biasa','Anggota Kehormatan'])->nullable()->default('Anggota Biasa');
            $table->string('name');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('place')->nullable();
            $table->date('dob')->nullable();
            $table->string('docid')->nullable();
            $table->string('nodocid')->nullable();
            $table->string('contact')->nullable()->unique();
            $table->enum('gender',['L','P'])->nullable();
            $table->string('address')->nullable();
            $table->string('religion')->nullable();
            $table->string('province')->nullable();
            $table->string('regency')->nullable();
            $table->string('district')->nullable();
            $table->string('villages')->nullable();
            $table->string('tmt-cpns')->nullable();
            $table->string('tmt-pns')->nullable();
            $table->string('leveledu')->nullable();
            $table->string('lastedu')->nullable();
            $table->string('image')->nullable();
            $table->date('active_at')->nullable();
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
        Schema::dropIfExists('profile_data_mains');
    }
};
