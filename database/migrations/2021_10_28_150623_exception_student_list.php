<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExceptionStudentList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exception_student_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('student_id');
            $table->boolean('add');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('student_id')->references('id')->on('students');
<<<<<<< HEAD

=======
>>>>>>> f845749520d2e9b45f513255c34c7df2832d3d1c
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("exception_student_list");
    }
}
