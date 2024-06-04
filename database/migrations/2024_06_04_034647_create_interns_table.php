<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string('intern_name');
            $table->date('birth_date');
            $table->string('nrc');
            $table->string('email');
            $table->string('password');
            $table->integer('phone');
            $table->string('roll_no');
            $table->string('degree');
            $table->string('specialization');
            $table->string('class_project');
            $table->string('activity');
            $table->string('skill');
            $table->string('qualification');
            $table->string('gender');
            $table->string('address');

           // $table->bigInteger('supervisor_id')->nullable();
           // $table->foregin('supervisor_id')->references('id')->on('supervisors')->onDelete('cascade');
           // $table->binary('image')->nullable();
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
        Schema::dropIfExists('interns');
    }
}
