<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswa', function($table) {
            $table->foreign('username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('petugas', function($table) {
            $table->foreign('username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('buku', function($table) {
            $table->foreign('id_kategori_buku')->references('id_kategori_buku')->on('kategori_buku')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::table('transaksi_buku', function($table) {
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onUpdate('restrict')->onDelete('restrict');
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
    }
}
