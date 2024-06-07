<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('intern_id');
            $table->string('roll_no');
            $table->unsignedBigInteger('company_id');
            $table->string('company_username');
            $table->string('period');
            $table->string('leaves_day');
            $table->string('contact_supervisor');
            $table->string('punctual');
            $table->string('reliably_performed_assignments');
            $table->string('ability_solve_problem');
            $table->string('organization_skills');
            $table->string('communication_skills');
            $table->string('ability_work_independently');
            $table->string('willingness_learn_new_tasks');
            $table->string('eagerness_to_learn');
            $table->string('basic_skill');
            $table->string('professional_appearance');
            $table->string('overall_assessment_work_quality');
            $table->text('professional_viewpoint');
            $table->text('comments_student');
            $table->text('comments_intership');
            $table->text('comments');
            $table->timestamps();
        });

        Schema::table('evaluations', function($table) {
            $table->foreign('intern_id')->references('id')->on('interns');
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
        Schema::dropIfExists('evaluations');
    }
}
