<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intern_id'); 
            $table->string('roll_no');
            $table->string('month');
            $table->string('week');
            $table->text('first_description');
            $table->text('second_description');
            $table->text('third_description');
            $table->text('fourth_description');
            $table->text('fifth_description');
            $table->text('comment');
            $table->text('reflection');
            $table->timestamps();
        });

        
        Schema::table('reports', function($table) {
            $table->foreign('intern_id')->references('id')->on('interns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
