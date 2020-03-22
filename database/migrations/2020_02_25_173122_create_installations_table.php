<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('upload', 2)->default(0);
            $table->float('download', 2)->default(0);
            $table->float('signal', 2)->default(0);
            $table->date('dateInstall')->nullable();
            $table->boolean('statut')->default(0);
            $table->integer('idEquipe')->default(0);
            $table->integer('idSouscription');
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
        Schema::dropIfExists('installations');
    }
}
