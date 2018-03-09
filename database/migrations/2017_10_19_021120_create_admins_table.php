<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->unsignedInteger('id_admin');
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedInteger('registeredBy');
            $table->timestamps();
        });

        Schema::table('admins', function($table) {
            $table->primary('id_admin');
            $table->foreign('id_admin')->references('id')->on('users');
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
        Schema::dropIfExists('admins');
    }
}
