<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('development_value');
            $table->integer('type_payment');
            $table->string('payment_amount');
            $table->string('url');
            $table->date('start_date');
            $table->date('licensing')->default('2018-01-01');
            $table->integer('id_cli');
            $table->integer('id_prod');
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
        //
        Schema::dropIfExists('sales_table');
    }
}
