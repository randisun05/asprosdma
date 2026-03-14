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
       Schema::create('positions', function (Blueprint $table) {
		$table->id();
		$table->string('title')->unique();
		$table->timestamps();
	});
        Schema::table('members', function (Blueprint $table) {
		$table->tinyInteger('position_id')->nullable()->after('id');
	});



    Schema::table('events', function (Blueprint $table) {
		$table->enum('random_question', ['Y', 'N'])->default('Y');
        $table->enum('random_answer', ['Y', 'N'])->default('Y');
        $table->enum('show_answer', ['Y', 'N'])->default('Y');
        $table->integer('duration')->nullable();
        $table->timestamp('start_at')->nullable();
        $table->timestamp('end_at')->nullable();

	});

     Schema::table('detail_events', function (Blueprint $table) {
        $table->timestamp('start_at')->nullable();
        $table->timestamp('end_at')->nullable();
        $table->integer('duration')->nullable();
        $table->integer('total_correct')->nullable();
        $table->decimal('grade', 5, 2)->nullable();
        $table->index('event_id');
        $table->index('member_id');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
        Schema::table('members', function (Blueprint $table) {
        $table->dropColumn('position_id');
    });
    }
};
