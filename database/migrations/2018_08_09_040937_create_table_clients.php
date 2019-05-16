<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clients_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('address');
            $table->string('rf_point');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('cpf');
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
        Schema::dropIfExists('clients_table');
        //
    }
}
