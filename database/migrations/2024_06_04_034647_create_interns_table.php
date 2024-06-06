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
            $table->string('name');
            $table->date('birth_date');
            $table->string('nrc');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('roll_no');
            $table->string('degree');
            $table->string('specialization');
            $table->text('class_project');
            $table->text('activity');
            $table->text('skill');
            $table->text('qualification');
            $table->string('gender');
            $table->text('address');
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
