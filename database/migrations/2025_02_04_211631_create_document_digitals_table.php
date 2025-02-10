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
        Schema::create('document_digitals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('perihal');
            $table->string('no_surat')->nullable();
            $table->string('jenis')->nullable();
            $table->string('speciment')->nullable();
            $table->string('nipttd')->nullable();
            $table->string('anchor')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('nipparaf')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('document')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->default('submitted');
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
        Schema::dropIfExists('document_digitals');
    }
};
