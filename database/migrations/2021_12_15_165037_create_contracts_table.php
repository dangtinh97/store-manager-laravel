<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->string('name_contract');
            $table->string('number_contract')->unique();
            $table->timestamp('effective_date');
            $table->timestamp('expiration_date')->nullable();
            $table->string('status')->default('NEW');
            $table->integer('quantity');
            $table->float('price',25,2);
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
        Schema::dropIfExists('contracts');
    }
}
