<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories_bill', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_id');
            $table->float('price',25,2);
            $table->integer('quantity');
            $table->string('status')->default('NORMAL');
            $table->string('code');
            $table->integer('admin_id');
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
        Schema::dropIfExists('histories_bill');
    }
}
