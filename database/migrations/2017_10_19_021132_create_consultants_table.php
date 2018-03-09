<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->unsignedInteger('id_consultant');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('level');
            $table->unsignedInteger('registeredBy');
            $table->timestamps();
        });

        Schema::table('consultants', function($table) {
            $table->primary('id_consultant');
            $table->foreign('id_consultant')->references('id')->on('users');
            $table->foreign('registeredBy')->references('id_admin')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultants');
    }
}
