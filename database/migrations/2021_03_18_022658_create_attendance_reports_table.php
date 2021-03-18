<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee');
            $table->string('position');
            $table->string('project');
            $table->dateTime('date');
            $table->string('workingdays');
            $table->string('mandays');
            $table->string('note')->nullable();
            $table->string('approve');
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
        Schema::dropIfExists('attendance_reports');
    }
}
