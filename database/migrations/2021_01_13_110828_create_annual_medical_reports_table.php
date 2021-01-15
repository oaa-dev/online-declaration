<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualMedicalReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_medical_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->longText('diagnosis')->nullable();
            $table->longText('general_physical_description')->nullable();
            $table->longText('known_allergies')->nullable();
            $table->string('temperature')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('pulse')->nullable();
            $table->string('respiration')->nullable();
            $table->string('cholesterol')->nullable();
            $table->string('eyes')->nullable();
            $table->string('nose')->nullable();
            $table->string('throat')->nullable();
            $table->string('ears')->nullable();
            $table->string('chest')->nullable();
            $table->string('lungs')->nullable();
            $table->string('heart')->nullable();
            $table->string('prostate_specific_antigen')->nullable();
            $table->string('male_genital_development')->nullable();
            $table->string('pap_smear')->nullable();
            $table->string('breast_exam')->nullable();
            $table->string('mammography')->nullable();
            $table->string('female_genital_development')->nullable();
            $table->string('vision')->nullable();
            $table->string('hearing')->nullable();
            $table->string('dental')->nullable();
            $table->string('urinalysis')->nullable();
            $table->string('sigmoidoscopy')->nullable();
            $table->string('stool_occult_blood')->nullable();
            $table->string('colonoscopy')->nullable();
            $table->string('extremities')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('date')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('annual_medical_reports');
    }
}
