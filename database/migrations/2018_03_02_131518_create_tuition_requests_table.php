<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuitionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('tuition_id');
            $table->unsignedInteger('teacher_id');
            $table->string('teacher_responded');
            $table->string('response');
            $table->string('description');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('tuition_id')->references('id')->on('tuitions');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->unique(['teacher_id','student_id','tuition_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuition_requests');
    }
}
