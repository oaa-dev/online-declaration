<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidPatientMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_patient_monitorings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('patient_code');
            $table->string('temperature');
            $table->string('fever');
            $table->string('cough');
            $table->string('shortness_of_breathing');
            $table->string('sore_throat');
            $table->string('headache');
            $table->string('body_pain');
            $table->string('colds');
            $table->string('vomiting');
            $table->string('diarrhea');
            $table->string('fatigue_chill');
            $table->string('joint_pains');
            $table->string('other_symptoms');
            $table->string('health_condition');
            $table->string('informant');
            $table->string('relationship');
            $table->string('contact_number');
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
        Schema::dropIfExists('covid_patient_monitorings');
    }
}
