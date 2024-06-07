<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intern_id');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('company_id');
            $table->string('duration');
            $table->string('description');

            $table->timestamps();
        });

        Schema::table('internships', function($table) {
            $table->foreign('intern_id')->references('id')->on('interns');
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
