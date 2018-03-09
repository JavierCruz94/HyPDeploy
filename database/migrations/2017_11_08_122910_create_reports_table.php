<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_report');
            $table->timestamps();
            $table->time('arrival_time');
            $table->time('finishing_time');
            $table->string('comments');
        });

        //agregar columan a requests
        Schema::table('requests', function (Blueprint $table) {
            $table->unsignedInteger('id_report')->nullable();
        });

        //agregar foreign key a requests
        Schema::table('requests', function($table) {
            $table->foreign('id_report')->references('id_report')->on('reports');
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
