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
       Schema::create('answers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('event_id')->references('id')->on('events')->cascadeOnDelete();
        $table->foreignId('detail_event_id')->references('id')->on('detail_events')->cascadeOnDelete();
        $table->foreignId('question_id')->references('id')->on('questions')->cascadeOnDelete();
        $table->foreignId('member_id')->references('id')->on('members')->cascadeOnDelete();
        $table->integer('question_order');
        $table->string('answer_order');
        $table->integer('answer');
        $table->enum('is_correct', ['Y', 'N'])->default('N');
        $table->timestamps();

          $table->unique([
            'event_id',
            'detail_event_id',
            'question_id'
        ], 'unique_event_question');

        $table->index(['event_id']);
        $table->index(['detail_event_id']);
        $table->index(['question_id']);
         $table->index(['member_id']);
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
