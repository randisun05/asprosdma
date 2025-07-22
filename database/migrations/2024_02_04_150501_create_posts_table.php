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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories')->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('member_id')->references('id')->on('members')->restrictOnDelete()->restrictOnUpdate();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('body');
            $table->longText('excerpt');
            $table->string('image')->nullable();
            $table->string('document')->nullable();
            $table->string('tag')->nullable();
            $table->timestamp('publish_at')->nullable();
            $table->enum('status',['private','submission','approved','rejected','perlu ada perbaikan','limited', 'return']);
            $table->enum('docstatus',['1','0'])->default('1');
            $table->enum('imagestatus',['1','0'])->default('1');
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
        Schema::dropIfExists('posts');
    }
};
