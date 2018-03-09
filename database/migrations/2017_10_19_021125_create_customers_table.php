<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedInteger('id_customer');
            $table->string('code')->unique();
            $table->string('name');
            $table->unsignedInteger('registeredBy');
            $table->timestamps();
        });

        Schema::table('customers', function($table) {
            $table->primary('id_customer');
            $table->foreign('id_customer')->references('id')->on('users');
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
        Schema::dropIfExists('customers');
    }
}
