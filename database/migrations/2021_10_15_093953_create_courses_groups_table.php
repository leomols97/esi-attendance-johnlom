<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('courses_groups', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->unsignedInteger('group_id');
            $table->foreign('course_id')->references('ue')->on('courses');
            $table->foreign('group_id')->references('name')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seance_groups');
    }
}
