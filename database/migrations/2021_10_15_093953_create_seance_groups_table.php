<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migrations done with SQLite
 */
class CreateSeanceGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seance_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('seance_id');
            $table->unsignedInteger('group_id');
            $table->foreign('seance_id')->references('seances')->on('id');
            $table->foreign('group_id')->references('groups')->on('id');
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
