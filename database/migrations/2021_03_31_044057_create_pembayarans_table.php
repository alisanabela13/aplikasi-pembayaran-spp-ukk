<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade');
            $table->UnsignedBigInteger('id_petugas')->nullable();
            $table->foreign('id_petugas')->references('id')->on('petugas');
            $table->UnsignedBigInteger('id_spp');
            $table->foreign('id_spp')->references('id')->on('spps');
            $table->UnsignedBigInteger('id_tapel');
            $table->foreign('id_tapel')->references('id')->on('tapels');
            $table->integer('biaya');
            $table->string('bukti_pembayaran');
            $table->date('tgl_pembayaran');
            $table->enum('status', ['Belum Terverifikasi', 'Lunas', 'Ditolak']);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
}
