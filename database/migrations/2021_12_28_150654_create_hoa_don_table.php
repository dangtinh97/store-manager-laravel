<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qtv_id');
            $table->foreign('qtv_id')->references('id')->on('quan_tri_vien');
            $table->string('ten_hoa_don');
            $table->unsignedBigInteger('du_an');
            $table->integer('ma_du_an');
            $table->integer('so_luong');
            $table->float('don_gia',25,2);
            $table->string('trang_thai')->default('EXPORT');
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
        Schema::dropIfExists('hoa_don');
    }
}
