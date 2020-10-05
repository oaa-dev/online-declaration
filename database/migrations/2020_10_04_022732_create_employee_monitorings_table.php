<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_monitorings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('shifting_schedule_id');
            $table->foreign('shifting_schedule_id')->references('id')->on('shifting_schedules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('temperature');
            $table->string('fever');
            $table->string('cough');
            $table->string('shortness_of_breathing');
            $table->string('sore_throat');
            $table->string('headache');
            $table->string('body_pain');
            $table->string('household_member_positive');
            $table->string('person_diagnosed_positive');
            $table->string('person_monitor');
            $table->string('living_with_frontliners');
            $table->string('relative_arrived_overseas');
            $table->integer('identifier');
            $table->string('status');
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
        Schema::dropIfExists('employee_monitorings');
    }
}
