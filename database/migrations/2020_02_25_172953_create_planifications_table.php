<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datePlan');
            $table->boolean('statutPlan')->default(0);
            $table->integer('idEmp');
            $table->integer('idInstallation');
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
        Schema::dropIfExists('planifications');
    }
}
