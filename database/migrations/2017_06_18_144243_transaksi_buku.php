<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_buku', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->integer('id_buku')->unsigned()->index();
            $table->integer('id_siswa')->unsigned()->index();
            $table->date('tanggal_pinjam_buku');
            $table->date('tanggal_jatuh_tempo');
            $table->date('tanggal_kembalikan_buku')->nullable();
            $table->integer('status')->nullable()->comment('1=Belum Kembali; 2=Sudah Kembali;');
            $table->string('denda');
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
        Schema::dropIfExists('transaksi_buku');
    }
}
